<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\EventType;
use App\Repository\EventRepository;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CreateEventController extends AbstractController
{

    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/create/event', name: 'app_create_event', methods: ['GET', 'POST'])]
    public function index(Request $request,EventRepository $eventRepository): Response
    {
       // $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $event = new Event();
        

        $form = $this->createFormBuilder($event)
            ->add('nomEvent')
            ->add('nbPlace')
            ->add('nbInscrit')
            ->add('idcategorie')
            ->getForm();

            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventRepository->save($event, true);

            return $this->redirectToRoute('app_create_event', [], Response::HTTP_SEE_OTHER);
        }
            

        return $this->render('create_event/index.html.twig', [
            'controller_name' => 'CreateEventController',
            'form' => $form->createView(),
        ]);
    }
}
