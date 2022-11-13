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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class CreateEventController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[IsGranted("ROLE_ORGANISATEUR")]
    #[Route('/create/event', name: 'app_create_event', methods: ['GET', 'POST'])]

    public function index(Request $request,EventRepository $eventRepository, LieuRepository $lieuRepository, SluggerInterface $slugger,): Response
    {
       // $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $event = new Event();
        $lieu = new Lieu();
        $user = $this->security->getUser();

        
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
