<?php

namespace App\Controller;

use App\Entity\ImageUser;
use App\Form\ImageUserType;
use App\Repository\ImageUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/image/user')]
class ImageUserController extends AbstractController
{
    #[Route('/', name: 'app_image_user_index', methods: ['GET'])]
    public function index(ImageUserRepository $imageUserRepository): Response
    {
        return $this->render('image_user/index.html.twig', [
            'image_users' => $imageUserRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_image_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImageUserRepository $imageUserRepository, SluggerInterface $slugger): Response
    {
        $imageUser = new ImageUser();
        $form = $this->createForm(ImageUserType::class, $imageUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $pdp = $form->get('UrlImage')->getData();
           
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
                $imageUser->setUrlImage($newFileName);
            }
            $imageUserRepository->save($imageUser, true);
            return $this->redirectToRoute('app_image_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('image_user/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('categorie/{id}', name: 'app_image_user_show', methods: ['GET'])]
    public function show(ImageUser $imageUser): Response
    {
        return $this->render('image_user/show.html.twig', [
            'image_user' => $imageUser,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_image_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImageUser $imageUser, ImageUserRepository $imageUserRepository): Response
    {
        $form = $this->createForm(ImageUserType::class, $imageUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageUserRepository->save($imageUser, true);

            return $this->redirectToRoute('app_image_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('image_user/edit.html.twig', [
            'image_user' => $imageUser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_image_user_delete', methods: ['POST'])]
    public function delete(Request $request, ImageUser $imageUser, ImageUserRepository $imageUserRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imageUser->getId(), $request->request->get('_token'))) {
            $imageUserRepository->remove($imageUser, true);
        }

        return $this->redirectToRoute('app_image_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
