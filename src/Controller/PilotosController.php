<?php

namespace App\Controller;

use App\Entity\Pilotos;
use App\Form\PilotosType;
use App\Repository\PilotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pilotos')]
class PilotosController extends AbstractController
{
    #[Route('/', name: 'app_pilotos_index', methods: ['GET'])]
    public function index(PilotosRepository $pilotosRepository): Response
    {
        return $this->render('pilotos/index.html.twig', [
            'pilotos' => $pilotosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pilotos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PilotosRepository $pilotosRepository): Response
    {
        $piloto = new Pilotos();
        $form = $this->createForm(PilotosType::class, $piloto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pilotosRepository->save($piloto, true);

            return $this->redirectToRoute('app_pilotos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pilotos/new.html.twig', [
            'piloto' => $piloto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pilotos_show', methods: ['GET'])]
    public function show(Pilotos $piloto): Response
    {
        return $this->render('pilotos/show.html.twig', [
            'piloto' => $piloto,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pilotos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pilotos $piloto, PilotosRepository $pilotosRepository): Response
    {
        $form = $this->createForm(PilotosType::class, $piloto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pilotosRepository->save($piloto, true);

            return $this->redirectToRoute('app_pilotos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pilotos/edit.html.twig', [
            'piloto' => $piloto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pilotos_delete', methods: ['POST'])]
    public function delete(Request $request, Pilotos $piloto, PilotosRepository $pilotosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$piloto->getId(), $request->request->get('_token'))) {
            $pilotosRepository->remove($piloto, true);
        }

        return $this->redirectToRoute('app_pilotos_index', [], Response::HTTP_SEE_OTHER);
    }
}
