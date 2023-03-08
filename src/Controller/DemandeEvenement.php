<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormView;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Form;

#[Route('/demande/event')]
class DemandeEvenement extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/', name: 'app_demande_event', methods: ['GET', 'POST'])]
    public function indexdemandeEv(EventRepository $eventRepository): Response
    {
        return $this->render('demande_event/index.html.twig', [
            'events' => $eventRepository->findEventDemande(),
        ]); 
    }
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/montrer/{id}', name: 'app_montre_event', methods: ['GET', 'POST'])]
    public function voirdemandeEv(EventRepository $eventRepository, $id): Response
    {
        return $this->render('demande_event/montrer.html.twig', [
            'event' => $eventRepository->findEventDemandeMontrer($id),
        ]); 
    }
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{id}', name: 'app_accept_event', methods: ['GET', 'POST'])]
    public function AcceptedemandeEV(Request $request, Event $event, EventRepository $eventRepository): Response
    {
        $event->setAccept(1);
        $eventRepository->save($event, true);
        return $this->redirectToRoute('app_demande_event', [], Response::HTTP_SEE_OTHER);
    }
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{id}/edit', name: 'app_demande_edit', methods: ['GET', 'POST'])]
    public function editDemandeEv(Request $request, Event $event, EventRepository $eventRepository): Response
    {
        $form = $this->createFormBuilder($event)
            ->add('nomEvent')
            ->add('nbPlace')
            ->add('description')
            ->add('idcategorie')
            
            ->add('datedebut',DateType::Class, array(
                'input' => 'datetime_immutable',
                'years' => range(date('Y'), date('Y')+2),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),))
            ->add('datefin',DateType::Class, array(
                'input' => 'datetime_immutable',
                'years' => range(date('Y'), date('Y')+3),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),))
            ->add('logoEv', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,

                'constraints' =>[
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Merci de mettre une image en format PNG/JPG'
                    ])
                ]
            ])
            ->getForm();
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $logoEvFile = $form->get('logoEv')->getData();
            if ($logoEvFile) {
                $originalFilename = pathinfo($logoEvFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$logoEvFile->guessExtension();
    
            try {
                $logoEvFile->move(
                $this->getParameter('logoEv_directory'),
                $newFilename
            );
            } catch (FileException $e) {
            // ... handle exception if something happens during file upload
            }
    
        $event->setLogoEv($newFilename);
    }


        
            $eventRepository->save($event, true);
           
            return $this->redirectToRoute('app_montre_event',['id' => $event->getId() ], Response::HTTP_SEE_OTHER);
        }
            

        return $this->render('demande_event/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}