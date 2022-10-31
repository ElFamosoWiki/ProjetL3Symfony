<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ImageUser;
use App\Form\ImageUserType;
use App\Repository\ImageUserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\Persistence\ManagerRegistry;

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

}











