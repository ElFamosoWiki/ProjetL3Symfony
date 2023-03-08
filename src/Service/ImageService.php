<?php

namespace App\Service;
use App\Entity\ImageUser;
use App\Form\ImageUserType;
use App\Repository\ImageUserRepository;
use App\Controller\ImageUserController;


class ImageService {


    

    public function url(EntityManagerInterface $entityManager): ?string
    {
        $image = new ImageUser();
        $repository = $entityManager->getRepository(ImageUser::class);
        $image = ($repository = findOneBySomeField($id));
        return $image->getUrlImage();
    }
}