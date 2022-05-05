<?php 

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private $client;

    public function __construct(HttpClientInterface $client,string $caravel_api, string $caravel_key)
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
    
} 

/* http://placekitten.com/200/300 */