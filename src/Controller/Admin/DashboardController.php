<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\User;
use App\Entity\Event;
use App\Entity\DemandeOrganisateur;
use App\Entity\SousCategorie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
     return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
        ->setTitle('Menu Administration')
        ->renderContentMaximized();    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Evenements', 'fas fa-gamepad', Event::class);
        yield MenuItem::linkToCrud('Demande Organisateur', 'fas fa-envelope', DemandeOrganisateur::class); 
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-file', Categorie::class);
        yield MenuItem::linkToCrud('Sous-catégorie', 'fas fa-plus', SousCategorie::class);
    }
}
