<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ImageUser;
use App\Form\ImageUserType;
use App\Repository\ImageUserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\RegistrationFormType;
use App\Form\ProfilType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

#[Route('/{id}/profil')]
class ProfilController extends AbstractController{

    #[Route('/', name: 'app_profil_show', methods: ['GET'])]
    public function index(User $user, ImageUserRepository $ImageRepository, $id): Response
    {
        
        return $this->render('profil/pdp.html.twig', [
            'user' => $user,
            'image_users' => $ImageRepository->findOneById($id),
        ]);
       
    }
    #[Route('/modifie', name: 'app_profil_modifie', methods: ['GET', 'POST'])]
    public function modifie(Request $request, User $user, ImageUserRepository $imageUserRepository, UserRepository $users, $id, SluggerInterface $slugger): Response
    {
            
            $image = new ImageUser();
            $image=$imageUserRepository->findOneBySomeField($id);
            
         $form = $this->createFormBuilder($user)
            ->add('prenom')
            ->add('nom')
            ->add('pseudo')
            ->add('email')
            ->add('image', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,

                'constraints' =>[
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png'
                        ],
                        'mimeTypesMessage' => 'Merci de mettre une image en format PNG'
                    ])
                ]
            ])
            ->getForm();
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $pdp = $form->get('image')->getData();
                
                 if($pdp){
                     $originalFilename = pathinfo($pdp->getClientOriginalName(), PATHINFO_FILENAME);
                     $safeFilename = $slugger->slug($originalFilename);
                     $newFileName = $safeFilename.'-'.uniqid().'.'.$pdp->guessExtension();
                     try{
                         $pdp->move(
                             $this->getParameter('pdp_directory'),
                             $newFileName
                         );
                     } catch(FileExeception $e){
     
                     }
                     $image->setUrlImage($newFileName);
                 }
                }
            $users->save($user, true);
            $imageUserRepository->save($image, true);

            return $this->renderForm('profil/modif.html.twig', [
                'user' => $user,
                'form' => $form,
            ]);
    
}






}




