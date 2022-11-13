<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\LieuRepository;
use App\Entity\Lieu;
use Symfony\Component\HttpFoundation\Request;



class DashboardOrgaController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/dashboard/orga/{id}', name: 'app_dashboard_orga')]
    public function index(Request $request,UserRepository $userRepository,EventRepository $eventRepository, $id): Response
    {
        $user = $this->security->getUser();

        if ($id != $user->getId()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('dashboard_orga/index.html.twig', [
            'events' => $user->getEvents(),

        ]);
    }

    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/show/inscrit/{id}', name: 'app_show_inscrit', methods: ['GET'])]
    public function showReg(Request $request,UserRepository $userRepository,EventRepository $eventRepository,Event $event, $id): Response
    {

        

        if ($event->getAdminEvent() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('dashboard_orga/showRegister.html.twig', [
            'users' => $userRepository->findInscrit($id) ,
        ]);
    }

    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/edit/{id}', name: 'app_edit_event_orga', methods: ['GET','POST'])]
    public function editEvent(Request $request, EventRepository $eventRepository, Event $event, LieuRepository $lieuRepository, $id): Response
    {
        $user = $this->security->getUser();
        $lieu = new Lieu();

        if ($event->getAdminEvent() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createFormBuilder($event)
        ->add('nomEvent')
        ->add('nbPlace')
        ->add('description')
        ->add('idcategorie')
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
            $eventRepository->save($event, true);
            $lieuRepository->save($lieu, true);
            return $this->redirectToRoute('app_create_event', [], Response::HTTP_SEE_OTHER);
        }
         

        

        return $this->render('dashboard_orga/editevent.html.twig', [
            'controller_name' => 'CreateEventController',
            'form' => $form->createView(),
        ]);
    }
}
