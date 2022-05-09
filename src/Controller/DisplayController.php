<?php

namespace App\Controller;


use Exception;
use App\Service\ApiService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DisplayController extends AbstractController
{

    /* route "/" is defined as redirecting to "/welcome" in config/routes.yaml */

    
    /**
     * @Route(
     *      {
     *          "en": "/welcome",
     *          "fr": "/bienvenue",
     *      },
     *      name="welcome",
     *      requirements={
     *          "_locale": "%supported_locales%"
     *      }
     * )
     */
    public function welcome(Request $request ,ApiService $weatherApi): Response
    {
        $recommendations = [
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => 'Le bistrot Régent',
                'distance' => '0.2km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "Les jardins du Tonnelé",
                'distance' => '0.3km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "Papaye et Chocolat",
                'distance' => '0,8km',
            ],
            [
                'picture' => './activity.webp',
                'category' => 'activity',
                'name' => "Visite guidée des grottes de Savonnière",
                'distance' => '0,8km',
            ],
            [
                'picture' => './site.webp',
                'category' => 'site',
                'name' => "Château de Serigny sur le Loir",
                'distance' => '1,2km',
            ]
        ];
        
        $lat = $request->query->get('lat') | 47;
        $long = $request->query->get('lng') | 0.6;
        try {
            $weatherData = json_decode($weatherApi->getData($lat, $long));
            
        } catch (Exception $exception) {
            $weatherData = null;
        }
        return $this->render("welcome.html.twig", [
            'weatherData' => $weatherData,
            'recommendations' => $recommendations,
        ]);
    }

    /**
     * @Route(
     *      {
     *          "en": "/around",
     *          "fr": "/a-proximite",
     *      },
     *      name="around",
     *      requirements={
     *          "_locale": "supported_locales"
     *      }
     * )
     */
    public function around(): Response
    {
        $recommendations = [
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => 'Le bistrot Régent',
                'distance' => '0.2km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "Les jardins du Tonnelé",
                'distance' => '0.3km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "Papaye et Chocolat",
                'distance' => '0,8km',
            ],
            [
                'picture' => './activity.webp',
                'category' => 'activity',
                'name' => "Visite guidée des grottes de Savonnière",
                'distance' => '0,8km',
            ],
            [
                'picture' => './site.webp',
                'category' => 'site',
                'name' => "Château de Serigny sur le Loir",
                'distance' => '1,2km',
            ]
        ];
        return $this->render("around.html.twig", [
            'recommendations' => $recommendations,
        ]);
    }
}
