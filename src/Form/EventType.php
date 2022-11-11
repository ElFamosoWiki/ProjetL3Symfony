<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
     
        $builder->add('nomEvent')
        ->add('nbPlace')
        ->add('description')
        ->add('idcategorie', EntityType::class, [
            'class' => Categorie::class,
            'choice_label'=> 'nomCategorie',
            'placeholder' => 'Selectionner une catégorie',
            'query_builder' => function(CategorieRepository $cat){
                return $cat->createQueryBuilder('c')->orderBy('c.nomCategorie', 'ASC');
            },
            'constraints' => new NotBlank(['message' => 'Choisi ou jte bute'])
        ])
        ->add('activite', EntityType::class, [
            'class' => Activite::class,
            'choice_label' => 'nomActivite',
            'disabled' => true,
            'placeholder' => 'Selectionner une activité',
            'query_builder' => function(ActiviteRepository $act){
                return $act->createQueryBuilder('c')->orderBy('c.souscategorie', 'ASC');
            }
                ])

        ->add('datedebut', DateTimeType::class, array(
            'input' => 'datetime_immutable'))
        ->add('datefin', DateTimeType::class, array(
            'input' => 'datetime_immutable'))
            ->add('image', FileType::class, [
                'label' => 'Logo evenement',
                'mapped' => false,
                'required' => false,

                'constraints' =>[
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Merci de mettre une image en format PNG'
                    ])
                ]
            ])
        ->getForm();
        $formModifier = function (FormInterface $form, Categorie $categorie = null) {
            $souscategorie = null === $categorie ? [] : $categorie->getAvaibleCaca();

            $form->add('souscategorie', EntityType::class, [
                'class' => SousCategorie::class,
                'placeholder' => '',
                'choices' => $souscategorie,
            ]);
        };
        
        $form->get('idcategorie')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $categorie = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback function!
                $formModifier($event->getForm()->getParent(), $categorie);
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
