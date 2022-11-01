<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\EventType;
use App\Repository\EventRepository;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CreateEventController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/create/event', name: 'app_create_event', methods: ['GET', 'POST'])]
    public function index(Request $request,EventRepository $eventRepository): Response
    {
       // $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $event = new Event();
        $user = $this->security->getUser();


        $form = $this->createFormBuilder($event)
            ->add('nomEvent')
            ->add('nbPlace')
            ->add('nbInscrit')
            ->add('idcategorie')
            ->getForm();

            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event->setAdminEvent($user);
            $eventRepository->save($event, true);

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
