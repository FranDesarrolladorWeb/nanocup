<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route;

class MainController
{
    #[Route('/')]
    public function Main(): Response
    {
        return new Response(' Fraann');
    }

    #[Route('/browse')]
    public function browse(): Response
    {
        
        return new Response(' Fraann');

    }
}