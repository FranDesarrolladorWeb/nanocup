<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function Index(): Response
    {
        return $this->render('home.html.twig');
    }
}