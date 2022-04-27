<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome(): Response
    {
        return $this->render("welcome.html.twig");
    }

    /**
     * @Route("/around", name="around")
     */
    public function around(): Response
    {
        return $this->render("around.html.twig");
    }
}
