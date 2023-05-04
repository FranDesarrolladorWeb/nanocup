<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reglamento')]
class ReglamentoController extends AbstractController
{
    #[Route('/', name: 'app_reglamento_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('reglamento/index.html.twig');
    }

    
}
