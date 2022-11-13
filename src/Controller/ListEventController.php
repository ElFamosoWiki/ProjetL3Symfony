<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListEventController extends AbstractController
{
    #[Route('/list/event', name: 'app_list_event', methods: ['GET'])]
    public function index(Request $request,EventRepository $eventRepository): Response
    {
        return $this->render('list_event/index.html.twig', [
            'events' => $eventRepository->findAllWithFilters($request->query->all()),
        ]);
    }
}
