<?php 

namespace App\Controller;
use App\Entity\ImageUser;
use App\Form\ImageUserType;
use App\Repository\ImageUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/map')]
class MapController extends AbstractController
{
    #[Route('/', name: 'app_map_test', methods: ['GET'])]
    public function index(ImageUserRepository $imageUserRepository): Response
    {
        return $this->render('TestAPI/map.html.twig', [
            
        ]);
    }
}