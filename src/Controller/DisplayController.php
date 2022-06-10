<?php

namespace App\Controller;


use Exception;
use App\Service\ApiService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    public function welcome(Request $request ,ApiService $apiService): Response
    {
        
        $lat = $request->query->get('lat') | 47;
        $long = $request->query->get('lng') | 0.6;
        try {
            $recommendations = json_decode($apiService->getRecommendations('site'));
            
        } catch (Exception $exception) {
            $recommendations = null;
        }
        return $this->render("welcome.html.twig", [
            'recommendations' => $recommendations
        ]);
    }

    /**
     * @Route(
     *      {
     *          "en": "/details/{establishment}",
     *          "fr": "/details/{establishment}",
     *      },
     *      name="details",
     *      requirements={
     *          "_locale": "%supported_locales%"
     *      }
     * )
     */
    public function details(string $establishment): Response
    {
        return $this->render("detailedView.html.twig", []);
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
        // $recommendations = [
        //     [
        //         'picture' => './resto.webp',
        //         'category' => 'restaurant',
        //         'name' => 'Le bistrot Régent',
        //         'distance' => '0.2km',
        //     ],
        //     [
        //         'picture' => './resto.webp',
        //         'category' => 'restaurant',
        //         'name' => "Les jardins du Tonnelé",
        //         'distance' => '0.3km',
        //     ],
        //     [
        //         'picture' => './resto.webp',
        //         'category' => 'restaurant',
        //         'name' => "Papaye et Chocolat",
        //         'distance' => '0,8km',
        //     ],
        //     [
        //         'picture' => './activity.webp',
        //         'category' => 'activity',
        //         'name' => "Visite guidée des grottes de Savonnière",
        //         'distance' => '0,8km',
        //     ],
        //     [
        //         'picture' => './site.webp',
        //         'category' => 'site',
        //         'name' => "Château de Serigny sur le Loir",
        //         'distance' => '1,2km',
        //     ]
        // ];
        return $this->render("around.html.twig", [
            // 'recommendations' => $recommendations,
        ]);
    }

    /**
     * @Route(
     *      {
     *          "en": "/etablissements/{type}",
     *          "fr": "/etablissements/{type}",
     *      },
     *      name="establishments",
     *      requirements={
     *          "_locale": "%supported_locales%"
     *      }
     * )
     */
    public function recommentations(Request $request ,ApiService $apiService, string $type): JsonResponse
    {
        
        try {
            $recommendations = ($apiService->getRecommendations($type));
            
        } catch (Exception $exception) {
            $recommendations = null;
        }
        return new JsonResponse($recommendations);
            
    }

}
