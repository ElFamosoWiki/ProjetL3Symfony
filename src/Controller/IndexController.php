<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Entity\Event;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;




class IndexController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/index', name: 'app_index')]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'events' => $eventRepository->findAll(),
        ]);
    }

    
    #[Route('/registration/{id}/', name: 'app_registration_event', methods: ['GET'])]
    public function inscription(User $user, EventRepository $eventRepository, Event $event): Response
    {
     
      $user = $this->security->getUser();
      $securityContext = $this->container->get('security.authorization_checker');


        if($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            $event->addUser($user);
            $eventRepository->save($event, true);
            return $this->redirectToRoute('app_index', [], Response::HTTP_SEE_OTHER);

        }else{
            
            return $this->redirectToRoute('app_event', [], Response::HTTP_SEE_OTHER);

        }
        


    }
}
