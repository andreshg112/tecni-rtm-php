<?php

namespace Andreshg112\TecniRtm;

use GuzzleHttp\Client;

class TecniRtm
{
    /** @var string $apiKey Llave de la API suministrada por Tecni-RTM. */
    protected $apiKey = null;

    /** @var Client $http */
    protected $http = null;

    /** @var string $host URL o IP donde se encuentra instalado Tecni-RTM. */
    protected $host = null;

    /** @var string $secret Secreto de la API. */
    protected $secret = null;

    /**
     * Crea una instancia recibiendo la llave y el secreto.
     * Si no se pasan los parámetros, los toma de config/tecni-rtm.php (Solo Laravel).
     */
    public function __construct(Client $http = null)
    {
        $this->http = isset($http) ? $http : new Client();
        $this->host = config('tecni-rtm.host');
        $this->apiKey = config('tecni-rtm.api_key');
        $this->secret = config('tecni-rtm.secret');
    }

    /**
     * Consulta las revisiones terminadas durante el día de hoy.
     *
     * @return array
     */
    public function completedReviews()
    {
        $url = "{$this->host}/api/revisiones-terminadas";
        $timestamp = time();
        $payload = config('tecni-rtm.payload');
        $signature = hash('sha256', $payload . $timestamp . $this->secret);

        $json = [
            'api_key' => $this->apiKey, 'timestamp' => $timestamp, 'signature' => $signature,
            'payload' => $payload,
        ];

        $response = $this->http->post($url, ['json' => $json]);

        $result = json_decode((string)$response->getBody(), true);
        $payloadResponse = json_decode($result['payload'], true);

        return $payloadResponse;
    }

    /**
     * Consulta las revisiones en curso.
     *
     * @return array
     */
    public function ongoingReviews()
    {
        $url = "{$this->host}/api/revisiones-en-curso";
        $timestamp = time();
        $signature = hash('sha256', $timestamp . $this->secret);

        $json = ['api_key' => $this->apiKey, 'timestamp' => $timestamp, 'signature' => $signature];

        $response = $this->http->post($url, ['json' => $json]);

        $result = json_decode((string)$response->getBody(), true);
        $payload = json_decode($result['payload'], true);

        return $payload;
    }
}
