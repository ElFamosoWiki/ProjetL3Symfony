<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\EventType;
use App\Repository\EventRepository;
use App\Repository\LieuRepository;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use App\Entity\Lieu;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use App\Entity\SousCategorie;
use App\Form\SousCategorieType;
use App\Repository\SousCategorieRepository;
use App\Entity\Activite;
use App\Form\ActiviteType;
use App\Repository\ActiviteRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;



class CreateEventController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/create/event', name: 'app_create_event', methods: ['GET', 'POST'])]
    public function index(Request $request,EventRepository $eventRepository, LieuRepository $lieuRepository, SousCategorieRepository $scat, CategorieRepository $cat): Response
    {
       // $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $event = new Event();
        $lieu = new Lieu();
        $user = $this->security->getUser();


        $form = $this->createFormBuilder(['idcategorie' => $cat->find(10)])
        
            ->add('nomEvent')
            ->add('nbPlace')
            ->add('description')
            ->add('idcategorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label'=> 'nomCategorie',
                'placeholder' => 'Selectionner une catégorie',
                'query_builder' => function(CategorieRepository $cat){
                    return $cat->createQueryBuilder('c')->orderBy('c.nomCategorie', 'ASC');
                },
                'constraints' => new NotBlank(['message' => 'Choisi ou jte bute'])
            ])
            ->add('activite', EntityType::class, [
                'class' => Activite::class,
                'choice_label' => 'nomActivite',
                'disabled' => true,
                'placeholder' => 'Selectionner une activité',
                'query_builder' => function(ActiviteRepository $act){
                    return $act->createQueryBuilder('c')->orderBy('c.souscategorie', 'ASC');
                }
                    ])
            ->add('datedebut', DateTimeType::class, array(
                'input' => 'datetime_immutable'))
            ->add('datefin', DateTimeType::class, array(
                'input' => 'datetime_immutable'))
            ->getForm();
           
             
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event->setAdminEvent($user);
            $lieu->setVille($_COOKIE['city']);
            $lieu->setRue($_COOKIE['rue']);
            $lieu->setNumero($_COOKIE['numero']);
            $lieu->setDepartement($_COOKIE['departement']);
            $lieu->setRegion($_COOKIE['region']);
            $lieu->setCodepostal($_COOKIE['codepostal']);
            $event->setLieu($lieu);
            $event->setNomEvent($form->get('nomEvent')->getData());
            $event->setNbPlace($form->get('nbPlace')->getData());
            $event->setDescription($form->get('description')->getData());
            $event->setIdcategorie($form->get('idcategorie')->getData());
            $event->setSouscategorie($form->get('souscategorie')->getData());
            $event->setActivite($form->get('activite')->getData());
            $event->setDatedebut($form->get('datedebut')->getData());
            $event->setDatefin($form->get('datefin')->getData());
            $eventRepository->save($event, true);
            $lieuRepository->save($lieu, true);
            return $this->redirectToRoute('app_create_event', [], Response::HTTP_SEE_OTHER);
        }
            

        return $this->render('create_event/index.html.twig', [
            'controller_name' => 'CreateEventController',
            'form' => $form->createView(),
        ]);
    }




    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/show/inscrit/{id}', name: 'app_show_inscrit', methods: ['GET'])]
    public function showReg(Request $request,UserRepository $userRepository,EventRepository $eventRepository,Event $event, $id): Response
    {

        

        if ($event->getAdminEvent() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('create_event/showRegister.html.twig', [
            'users' => $userRepository->findInscrit($id) ,
        ]);
    }
}
