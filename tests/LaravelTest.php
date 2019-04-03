<?php

namespace Andreshg112\TecniRtm\Tests;

use Orchestra\Testbench\TestCase;
use Andreshg112\TecniRtm\TecniRtmFacade;
use Andreshg112\TecniRtm\TecniRtmServiceProvider;

class LaravelTest extends TestCase
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
        $mockedResponse = [
            [
                'id' => 1,
                'numero_fur' => 12345,
                'tipo_revision_id' => 4,
                'fecha_inicio' => '2019-04-02T16:56:49.000-05:00',
                'fecha_vencimiento' => '2020-04-02',
                'placa' => 'ABC123',
                'propietario__tipo_documento_id' => 1,
                'propietario__documento' => '12345678',
                'propietario__nombre' => 'ANDRES HERRERA GARCIA',
                'propietario__celular' => '3124567890',
                'contacto__nombre' => 'ANDRES HERRERA GARCIA',
                'contacto__telefono_1' => '5712345',
                'contacto__telefono_2' => '3012345678',
            ],
        ];

        TecniRtmFacade::shouldReceive('completedReviews')
            ->once()
            ->andReturns($mockedResponse);

        $reviews = TecniRtmFacade::completedReviews();

        $this->assertArraySubset($mockedResponse, $reviews);
    }

    /** @test */
    public function it_returns_a_list_of_ongoing_reviews()
    {
        $mockedResponse = [
            [
                'datos_custom' => [],
                'placa' => 'ABC123',
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
                'contacto__documento' => '1234567890',
                'contacto__nombre' => 'ANDRES HERRERA GARCIA',
                'contacto__direccion' => 'CRA 17A 14 94 LA POPA',
                'contacto__telefono_1' => '5712345',
                'contacto__telefono_2' => '3012345678',
                'contacto__email' => 'andreshg112@gmail.com',
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

        TecniRtmFacade::shouldReceive('ongoingReviews')
            ->once()
            ->andReturns($mockedResponse);

        $reviews = TecniRtmFacade::ongoingReviews();

        $this->assertArraySubset($mockedResponse, $reviews);
    }
}
