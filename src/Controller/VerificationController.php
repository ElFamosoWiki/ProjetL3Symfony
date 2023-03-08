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
use App\Repository\UserRepository;
use App\Entity\User;

#[Route('/verif')]
class VerificationController extends AbstractController {

    #[Route('/', name: 'app_verif_index', methods: ['GET'])]
    public function index(DemandeOrganisateurRepository $verifRepo): Response
    {

        return $this->render('verification/verif.html.twig', [
            'demandes' => $verifRepo->findByInn(),
        ]);
       
    }

    #[Route('/{id}/repondre', name: 'app_repondre', methods: ['GET', 'POST'] )]
    public function reponse(Request $request, DemandeOrganisateurRepository $verifRepo, DemandeOrganisateur $demande, UserRepository $users): Response
    {
        $finish = array();
        $finish[0]="ROLE_ORGANISATEUR";
        $user = new User();
        $form = $this->createFormBuilder($demande)
            ->add('Reponse')
            ->add('Accept')
            ->getForm();
            $form->handleRequest($request);
            if($form->get('Accept')->getData()==1){
                $user= $users->findOneBySomeField($demande->getUserId()->getId());
                $user->setRoles($finish);
                $users->save($user, true);
            }

            $verifRepo->save($demande, true);
           
            return $this->renderForm('verification/reponse.html.twig', [
                'demande' => $demande,
                'form' => $form,
            ]);
    }
}