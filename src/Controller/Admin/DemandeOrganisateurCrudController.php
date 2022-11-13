<?php

namespace App\Controller\Admin;

use App\Entity\DemandeOrganisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\Repository\DemandeOrganisateurRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DemandeOrganisateurCrudController extends AbstractCrudController
{
    public const ACTION_DEMANDE_ACCEPTER = 'Accepter';
    public const ACTION_DEMANDE_REFUSER = 'Refuser';
    public static function getEntityFqcn(): string
    {
        return DemandeOrganisateur::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $demandeAccepter = Action::new(self::ACTION_DEMANDE_ACCEPTER)
            ->linkToCrudAction('demandeOrganisateurAccepter');

        $demandeRefuser = Action::new(self::ACTION_DEMANDE_REFUSER)
            ->linkToCrudAction('demandeOrganisateurRefuser');

        return $actions
        ->add(CRUD::PAGE_DETAIL, $demandeAccepter)
        ->add(CRUD::PAGE_DETAIL, $demandeRefuser)
        ->add(CRUD::PAGE_INDEX, Action::DETAIL)
        ->remove(CRUD::PAGE_INDEX, Action::DELETE)
        ->remove(CRUD::PAGE_INDEX, Action::EDIT);

    
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud

        ->setEntityLabelInPlural('Demandes')
        ->setEntityLabelInSingular('Demande')

        ->setPageTitle("index", "Administation des Demandes Organisateur")
        ->setPaginatorPageSize(10);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            IdField::new('userId')
            ->hideOnForm(),
            TextField::new('motif_demande')
            ->hideOnIndex()
            ->setFormTypeOption('disabled', 'disabled'),
            ImageField::new('cni', 'Image')
            ->hideOnIndex()
            ->setBasePath('/uploads/cni/')
            ->setFormType(VichImageType::class),
           
            
        ];
    }

    public function demandeOrganisateurRefuser(AdminContext $context, Request $request, DemandeOrganisateur $demandeOrganisateur,
     DemandeOrganisateurRepository $demandeOrganisateurRepository): Response
    {
        {
            if ($this->isCsrfTokenValid('delete'.$demandeOrganisateur->getId(), $request->request->get('_token'))) {
                $demandeOrganisateurRepository->remove($demandeOrganisateur, true);
            }
    
            return $this->redirectToRoute('app_admin_demande', [], Response::HTTP_SEE_OTHER);
        }


    }


    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
