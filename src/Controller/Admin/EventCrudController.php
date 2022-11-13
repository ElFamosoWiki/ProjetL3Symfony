<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud

        ->setEntityLabelInPlural('Evenements')
        ->setEntityLabelInSingular('Evenement')

        ->setPageTitle("index", "Administation des évenements")
        ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            IdField::new('idCategorie')
            ->hideOnForm(),
            TextField::new('nomEvent'),
            IntegerField::new('nbPlace')
            ->hideOnIndex(),
            IntegerField::new('nbInscrit')
            ->hideOnIndex(),
            TextField::new('lieu')
            ->hideOnIndex(),
            ArrayField::new('users')
            ->hideOnIndex(),
            TextField::new('Description')
            ->hideOnIndex(),
        ];
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