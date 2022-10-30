<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\DemandeOrganisateur;
use Symfony\Component\Security\Core\Security;
use App\Form\Type\DemandeOrganisateurType;
use App\Repository\DemandeOrganisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\String\Slugger\SluggerInterface;


class OrganisateurApplicationController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    
    #[Route('/organisateur/application', name: 'app_organisateur_application', methods: ['GET', 'POST'])]
    public function index(Request $request,DemandeOrganisateurRepository $demandeOrganisateurRepository, SluggerInterface $slugger): Response
    {
        $demandeOrganisateur = new DemandeOrganisateur();
        $user = $this->security->getUser();
        $userId = $user->getId();
        $form = $this->createFormBuilder($demandeOrganisateur)
        ->add('cni', FileType::class, [
            'label' => 'Carte national d identité',
            'mapped' => false,
            'required' => true,

            'constraints' => [
                new File([
                    'maxSize' => '4096k',
                    'mimeTypes' => [
                        'image/png',
                        'image/jpeg',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid PNG document',
                ])
            ],
        ])
        ->add('motifDemande')
        ->getForm();

        $form->handleRequest($request);
//////////
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

    $demandeOrganisateur->setUserId($user);
    $demandeOrganisateurRepository->save($demandeOrganisateur, true);
    return $this->redirectToRoute('app_index', [], Response::HTTP_SEE_OTHER);

}

    
        return $this->render('organisateur_application/index.html.twig', [
            'controller_name' => 'OrganisateurApplicationController',
            'form' => $form->createView(),
            'demand' => $demandeOrganisateurRepository->ckIfDemande($user->getId()),
        ]);
    }
}
