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
                'name' => 'La bonne fourchette de Touraine du centre de la France en Europe',
                'distance' => '0.2km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "L'auberge de Ricardo",
                'distance' => '0.3km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "Lasagnes Alexandro",
                'distance' => '0,8km',
            ],
            [
                'picture' => './activity.webp',
                'category' => 'activity',
                'name' => "les data dans tous les états",
                'distance' => '0,8km',
            ],
            [
                'picture' => './site.webp',
                'category' => 'site',
                'name' => "Chez Pénélope",
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
                'name' => 'La bonne fourchette de Touraine',
                'distance' => '0.2km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "L'auberge de Ricardo",
                'distance' => '0.3km',
            ],
            [
                'picture' => './resto.webp',
                'category' => 'restaurant',
                'name' => "Lasagnes Alexandro",
                'distance' => '0,8km',
            ],
            [
                'picture' => './activity.webp',
                'category' => 'activity',
                'name' => "les data dans tous les états",
                'distance' => '0,8km',
            ],
            [
                'picture' => './site.webp',
                'category' => 'site',
                'name' => "Chez Pénélope, celle qui arrivait en retard aux mariages des autres",
                'distance' => '1,2km',
            ]
        ];
        return $this->render("around.html.twig", [
            'recommendations' => $recommendations,
        ]);
    }
}
