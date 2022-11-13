<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use App\Entity\SousCategorie;
use App\Form\SousCategorieType;
use App\Repository\SousCategorieRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEvent')
            ->add('nbPlace')
            ->add('idcategorie', EntityType::class, [
                'class' => Categorie::class,
                'required' => false,
                'label' => 'Catégorie'
            ])
            ->add('souscategorie', ChoiceType::class, [
                'placeholder'=> 'Sous catégorie veuillez choisir d abord une catégorie',
            ])

            ->add('accept', CheckboxType::class, [
                'label'    => 'Voulez vous valider la demande?',
                'required' => false,
            ]);

            $formModifier = function (FormInterface $form, Categorie $cate = null, SousCategorie $souscate = null){
                $souscategorie = null === $cate ? [] : $cate->getSousCategories();
                $form->add('souscategorie', EntityType::class, [
                    'class' => SousCategorie::class,
                    'choices' => $souscategorie,
                    'choice_label' =>'nomsousCategorie' ,
                    'placeholder' => 'Sous Catégorie (choisir une catégorie)',
                    'label' => 'Sous Catégorie',
                    'required' => false
                ]);
            };

            $builder->get('idcategorie')->addEventListener(
                FormEvents::POST_SUBMIT,
                function(FormEvent $evene) use ($formModifier){
                    $categorie = $evene->getForm()->getData();
                    $formModifier($evene->getForm()->getParent(), $categorie);
                }
            );

           
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
