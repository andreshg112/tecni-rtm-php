<?php

return [
    'host' => env('TECNI_RTM_HOST'),

    'api_key' => env('TECNI_RTM_API_KEY'),

    'secret' => env('TECNI_RTM_SECRET'),

    'payload' => '{
        "por_pagina": 30,
        "orden": [["fecha_inicio", "ASC"]],
        "campos": {
          "revisiones": [
            "numero_fur",
            "tipo_revision_id",
            "fecha_inicio",
            "fecha_vencimiento",
            "placa"
          ],
          "preinspeccion": [],
          "especiales": [],
          "datos": [],
          "datos_vehiculo": [
            "propietario__tipo_documento_id",
            "propietario__documento",
            "propietario__nombre",
            "propietario__celular",
            "contacto__nombre",
            "contacto__telefono_1",
            "contacto__telefono_2"
          ]
        },
        "criterios": {
          "revisiones": [["fecha_fin", "=", "hoy"], ["codigo_resultado", "=", "1"]],
          "datos": [],
          "datos_vehiculo": []
        },
        "formatos": []
      }',
];
