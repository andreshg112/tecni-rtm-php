<?php

namespace Andreshg112\TecniRtm\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Orchestra\Testbench\TestCase;
use Andreshg112\TecniRtm\TecniRtm;
use GuzzleHttp\Handler\MockHandler;
use function GuzzleHttp\json_encode;
use Andreshg112\TecniRtm\TecniRtmFacade;
use Andreshg112\TecniRtm\TecniRtmServiceProvider;

class TecniRtmTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [TecniRtmServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['TecniRtm' => TecniRtmFacade::class];
    }

    /** @test */
    public function it_returns_a_list_of_completed_reviews()
    {
        // Esta no es la verdadera estructura de la respuesta de la API.
        // Se debe modificar cuando se conozca la estructura.
        $payload = [
            [
                'datos_custom' => [],
                'placa' => 'XBHL80B',
                'pin' => null,
                'tipo_revision_id' => 'Motos libre',
                'fecha_inicio' => '2019-03-29T15:34:36.000-05:00',
                'secuencia' => null,
                'combustible_id' => [
                    'id' => 1,
                    'nombre' => 'GASOLINA',
                    'codigo' => '1',
                    'inactivo' => null,
                    'check' => null,
                    'created_at' => '2015-08-07T18:00:31.175-05:00',
                    'updated_at' => '2015-08-07T18:00:31.175-05:00',
                ],
                'soat__fecha_vencimiento' => null,
                'numero_autorizacion' => null,
                'consecutivo_runt' => null,
                'fecha_vencimiento' => null,
                'cilindraje' => null,
                'modelo' => null,
                'fecha_matricula' => null,
                'vin' => null,
                'propietario__documento' => null,
                'propietario__nombre' => null,
                'propietario__direccion' => null,
                'propietario__telefono' => null,
                'propietario__celular' => null,
                'contacto__documento' => '1065653410',
                'contacto__nombre' => 'JHONATAN  ARAUJO ',
                'contacto__direccion' => 'CRA 27A 34 94 EL PRADO',
                'contacto__telefono_1' => '5826565',
                'contacto__telefono_2' => '3046001870',
                'contacto__email' => 'jhonatanaraujo19@hotmail.com',
                'kilometraje' => '57737',
                'clase_id' => [
                    'id' => 9,
                    'nombre' => 'MOTOCICLETA',
                    'codigo' => '10',
                    'inactivo' => null,
                    'check' => null,
                    'created_at' => '2015-08-07T18:01:54.002-05:00',
                    'updated_at' => '2015-08-07T18:01:54.002-05:00',
                ],
                'servicio_id' => [
                    'id' => 1,
                    'nombre' => 'PARTICULAR',
                    'codigo' => '1',
                    'inactivo' => null,
                    'check' => null,
                    'created_at' => '2015-08-07T18:01:51.038-05:00',
                    'updated_at' => '2015-08-07T18:01:51.038-05:00',
                ],
            ],
        ];

        $mockedResponse = [
            'payload' => json_encode($payload),
        ];

        /** @var callable $mock */
        $mock = new MockHandler([
            new Response(200, [], json_encode($mockedResponse)),
        ]);

        $handler = HandlerStack::create($mock);

        $http = new Client(['handler' => $handler]);

        $tecniRtm = new TecniRtm($http);

        $reviews = $tecniRtm->completedReviews();

        $this->assertArraySubset($payload, $reviews);
    }

    /** @test */
    public function it_returns_a_list_of_ongoing_reviews()
    {
        $payload = [
            [
                'datos_custom' => [],
                'placa' => 'XBHL80B',
                'pin' => null,
                'tipo_revision_id' => 'Motos libre',
                'fecha_inicio' => '2019-03-29T15:34:36.000-05:00',
                'secuencia' => null,
                'combustible_id' => [
                    'id' => 1,
                    'nombre' => 'GASOLINA',
                    'codigo' => '1',
                    'inactivo' => null,
                    'check' => null,
                    'created_at' => '2015-08-07T18:00:31.175-05:00',
                    'updated_at' => '2015-08-07T18:00:31.175-05:00',
                ],
                'soat__fecha_vencimiento' => null,
                'numero_autorizacion' => null,
                'consecutivo_runt' => null,
                'fecha_vencimiento' => null,
                'cilindraje' => null,
                'modelo' => null,
                'fecha_matricula' => null,
                'vin' => null,
                'propietario__documento' => null,
                'propietario__nombre' => null,
                'propietario__direccion' => null,
                'propietario__telefono' => null,
                'propietario__celular' => null,
                'contacto__documento' => '1065653410',
                'contacto__nombre' => 'JHONATAN  ARAUJO ',
                'contacto__direccion' => 'CRA 27A 34 94 EL PRADO',
                'contacto__telefono_1' => '5826565',
                'contacto__telefono_2' => '3046001870',
                'contacto__email' => 'jhonatanaraujo19@hotmail.com',
                'kilometraje' => '57737',
                'clase_id' => [
                    'id' => 9,
                    'nombre' => 'MOTOCICLETA',
                    'codigo' => '10',
                    'inactivo' => null,
                    'check' => null,
                    'created_at' => '2015-08-07T18:01:54.002-05:00',
                    'updated_at' => '2015-08-07T18:01:54.002-05:00',
                ],
                'servicio_id' => [
                    'id' => 1,
                    'nombre' => 'PARTICULAR',
                    'codigo' => '1',
                    'inactivo' => null,
                    'check' => null,
                    'created_at' => '2015-08-07T18:01:51.038-05:00',
                    'updated_at' => '2015-08-07T18:01:51.038-05:00',
                ],
            ],
        ];

        $mockedResponse = [
            'payload' => json_encode($payload),
        ];

        /** @var callable $mock */
        $mock = new MockHandler([
            new Response(200, [], json_encode($mockedResponse)),
        ]);

        $handler = HandlerStack::create($mock);

        $http = new Client(['handler' => $handler]);

        $tecniRtm = new TecniRtm($http);

        $reviews = $tecniRtm->ongoingReviews();

        $this->assertArraySubset($payload, $reviews);
    }
}
