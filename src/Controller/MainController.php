<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function Index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/browse')]
    public function browse(): Response
    {
        
        return new Response(' Fraann');

    }
}