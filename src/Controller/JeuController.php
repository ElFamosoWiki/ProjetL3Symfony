<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Form\JeuType;
use App\Repository\JeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/jeu')]
class JeuController extends AbstractController
{
    #[Route('/', name: 'app_jeu_index', methods: ['GET'])]
    public function index(JeuRepository $jeuRepository): Response
    {
        return $this->render('jeu/index.html.twig', [
            'jeus' => $jeuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_jeu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, JeuRepository $jeuRepository): Response
    {
        $jeu = new Jeu();
        $form = $this->createForm(JeuType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jeuRepository->save($jeu, true);

            return $this->redirectToRoute('app_jeu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('jeu/new.html.twig', [
            'jeu' => $jeu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeu_show', methods: ['GET'])]
    public function show(Jeu $jeu): Response
    {
        return $this->render('jeu/show.html.twig', [
            'jeu' => $jeu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jeu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Jeu $jeu, JeuRepository $jeuRepository): Response
    {
        $form = $this->createForm(JeuType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jeuRepository->save($jeu, true);

            return $this->redirectToRoute('app_jeu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('jeu/edit.html.twig', [
            'jeu' => $jeu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeu_delete', methods: ['POST'])]
    public function delete(Request $request, Jeu $jeu, JeuRepository $jeuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jeu->getId(), $request->request->get('_token'))) {
            $jeuRepository->remove($jeu, true);
        }

        return $this->redirectToRoute('app_jeu_index', [], Response::HTTP_SEE_OTHER);
    }
}
