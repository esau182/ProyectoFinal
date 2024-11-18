<?php

namespace App\Services;

use App\Models\Coordenada;
use App\Models\Delito;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;

class GraphHopperService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        // Inicializar el cliente de Guzzle
        $this->client = new Client();
        // Obtener la API Key del archivo .env
        $this->apiKey = env('GRAPH_HOPPER_API_KEY');
    }

    /**
     * Calcular la ruta entre dos puntos.
     *
     * @param string $pointA Coordenadas de inicio (lat,lng).
     * @param string $pointB Coordenadas de destino (lat,lng).
     * @return array|mixed
     */
    public function calculateRoute($pointA, $pointB)
    {
        $client = new Client();

        $customModel = [
            'speed' => [],
            'areas' => [
                'type' => 'FeatureCollection',
                'features' => []
            ]
        ];
        
        /**
         * POR CADA REPORTE - 10%
         * SI SON > DE 10 REPORTES, DIRECTAMENTE 0
         */

        $delitos = Coordenada::all('longitud','latitud','penalizacion');

        $bannedAreas = $delitos->toArray();

        foreach ($bannedAreas as $index => $coordinates) {
            $customModel['speed'][] = [
                'if' => "in_custom{$index}",
                'multiply_by' => "{$coordinates['penalizacion']}"
            ];
    
            $customModel['areas']['features'][] = [
                'type' => 'Feature',
                'id' => "custom{$index}",
                'geometry' => [
                    'type' => 'Polygon',
                    'coordinates' => [
                        [
                            [$coordinates['longitud'] - 0.0005, $coordinates['latitud'] - 0.0005],
                            [$coordinates['longitud'] + 0.0005, $coordinates['latitud'] - 0.0005],
                            [$coordinates['longitud'] + 0.0005, $coordinates['latitud'] + 0.0005],
                            [$coordinates['longitud'] - 0.0005, $coordinates['latitud'] + 0.0005],
                            [$coordinates['longitud'] - 0.0005, $coordinates['latitud'] - 0.0005]
                        ]
                    ],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://graphhopper.com/api/1/route?key=f5bf4e36-594d-4df1-9758-b9ef6e599341', [
            'profile' => 'foot',
            'points' => [
                explode(',', $pointA),
                explode(',', $pointB)
            ],
            'ch.disable' => true,
            'custom_model' => $customModel
        ]);
        
        return $response->json();
    }
}