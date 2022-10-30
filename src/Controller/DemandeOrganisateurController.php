<?php

namespace App\Controller;

use App\Entity\DemandeOrganisateur;
use App\Form\DemandeOrganisateurType;
use App\Repository\DemandeOrganisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


#[Route('/demande/organisateur')]
class DemandeOrganisateurController extends AbstractController
{
    #[Route('/', name: 'app_demande_organisateur_index', methods: ['GET'])]
    public function index(DemandeOrganisateurRepository $demandeOrganisateurRepository): Response
    {
        return $this->render('demande_organisateur/index.html.twig', [
            'demande_organisateurs' => $demandeOrganisateurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_demande_organisateur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandeOrganisateurRepository $demandeOrganisateurRepository, SluggerInterface $slugger): Response
    {
        $demandeOrganisateur = new DemandeOrganisateur();
        $form = $this->createForm(DemandeOrganisateurType::class, $demandeOrganisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cniFile = $form->get('cni')->getData();
            if ($cniFile) {
                $originalFilename = pathinfo($cniFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$cniFile->guessExtension();

                try {
                    $cniFile->move(
                        $this->getParameter('cni_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $demandeOrganisateur->setCni($newFilename);
            }

                $demandeOrganisateurRepository->save($demandeOrganisateur, true);
    
            return $this->redirectToRoute('app_demande_organisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_organisateur/new.html.twig', [
            'demande_organisateur' => $demandeOrganisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demande_organisateur_show', methods: ['GET'])]
    public function show(DemandeOrganisateur $demandeOrganisateur): Response
    {
        return $this->render('demande_organisateur/show.html.twig', [
            'demande_organisateur' => $demandeOrganisateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_demande_organisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DemandeOrganisateur $demandeOrganisateur, DemandeOrganisateurRepository $demandeOrganisateurRepository): Response
    {
        $form = $this->createForm(DemandeOrganisateurType::class, $demandeOrganisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandeOrganisateurRepository->save($demandeOrganisateur, true);

            return $this->redirectToRoute('app_demande_organisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_organisateur/edit.html.twig', [
            'demande_organisateur' => $demandeOrganisateur,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_demande_organisateur_delete', methods: ['POST'])]
    public function delete(Request $request, DemandeOrganisateur $demandeOrganisateur, DemandeOrganisateurRepository $demandeOrganisateurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandeOrganisateur->getId(), $request->request->get('_token'))) {
            $demandeOrganisateurRepository->remove($demandeOrganisateur, true);
        }

        return $this->redirectToRoute('app_demande_organisateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
