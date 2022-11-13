<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud

        ->setEntityLabelInPlural('Utilisateurs')
        ->setEntityLabelInSingular('Utilisateur')

        ->setPageTitle("index", "Administation des utilisateurs")
        ->setPaginatorPageSize(10);
    }

    
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('nom')
            ->setFormTypeOption('disabled', 'disabled'),
            TextField::new('prenom')
            ->setFormTypeOption('disabled', 'disabled'),
            TextField::new('pseudo')
            ->setFormTypeOption('disabled', 'disabled'),
            TextField::new('email')
            ->setFormTypeOption('disabled', 'disabled'),
            BooleanField::new('Active')
            ->hideOnIndex(),
            ArrayField::new('roles'),
            ArrayField::new('Inscrit')
            ->HideOnIndex(),
            ArrayField::new('events')
            ->HideOnIndex(),

        ];
    }


    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if($entityInstance instanceof user)
        return;

        parent::persistEntity($em,$entityInstance);

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
