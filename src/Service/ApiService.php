<?php 

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private $client;
    
    public function __construct(HttpClientInterface $client,string $caravel_api, string $caravel_key, string $supported_locales)
    {
        $this->client = $client;
        $this->caravel_api = $caravel_api;
        $this->caravel_key = $caravel_key;
    }

    public function getData(string $lat, string $long ): string
    {
        try {
            $response = $this->client->request('GET', $this->caravel_api.'weather?lat='.$lat.'&lng='.$long.'&lang=fr', [
                'headers' => [
                    'X-Api-Key' => $this->caravel_key,
                ]
            ]);
            return $response->getContent();

        } catch (Exception $exception) {
            throw new Exception('Weather API error');
        }
    }

    public function getRecommendations(string $type): string
        {
        $recommendations = [
            [
                'picture' => 'tablier.png',
                'category' => 'restaurant',
                'name' => 'Le tablier rouge',
                'distance' => '1 km',
            ],
            [
                'picture' => 'tonnele.jpeg',
                'category' => 'restaurant',
                'name' => "Les jardins du Tonnelé",
                'distance' => '0.3 km',
            ],
            [
                'picture' => 'papaye.jpeg',
                'category' => 'restaurant',
                'name' => "Papaye et CHocolat",
                'distance' => '0,8 km',
            ],
            [
                'picture' => 'savonnieres.jpeg',
                'category' => 'activity',
                'name' => "Visite guidée des grottes de Savonnière",
                'distance' => '18 km',
            ],
            [
                'picture' => 'villandry.jpg',
                'category' => 'activity',
                'name' => "Découvrir les jardins de Villandry",
                'distance' => '11 km',
            ],
            [
                'picture' => 'youpi.jpg',
                'category' => 'activity',
                'name' => "Youpi mom",
                'distance' => '2 km',
            ],
            [
                'picture' => 'serigny.jpeg',
                'category' => 'site',
                'name' => "Château de Serigny sur le Loir",
                'distance' => '12 km',
            ],
            [
                'picture' => 'gatien.jpeg',
                'category' => 'site',
                'name' => "Cathédrale Saint Gatien",
                'distance' => '0,2 km',
            ],
            [
                'picture' => 'balzac.jpeg',
                'category' => 'site',
                'name' => "Maison de Balzac",
                'distance' => '1,8 km',
            ]
        ];
        
        
        $recommendations = array_filter($recommendations, function($recommendation) use ($type) {
            return $recommendation['category'] === $type;
        });
        /* dd(json_encode(array_values($recommendations))); */
        return(json_encode(array_values($recommendations)));


    } 
    
} 
