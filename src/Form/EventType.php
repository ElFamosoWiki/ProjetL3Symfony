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
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\Extension\Core\Type\FileType;

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
            ->add('datedebut',DateType::Class, array(
                'input' => 'datetime_immutable',
                'years' => range(date('Y'), date('Y')+2),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),))
            ->add('datefin',DateType::Class, array(
                'input' => 'datetime_immutable',
                'years' => range(date('Y'), date('Y')+3),
                'months' => range(date('m'), 12),
                'days' => range(date('d'), 31),))
            ->add('logoEv', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,

                'constraints' =>[
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Merci de mettre une image en format PNG/JPG'
                    ])
                ]
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
