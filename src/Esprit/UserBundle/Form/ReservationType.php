<?php

namespace Esprit\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type')
                ->add('dateCreation')
                ->add('dateArriveeH')
                ->add('dateSortieH')
                ->add('nbreAdultes')
                ->add('nbreEnfants')
                ->add('nbreNuits')
                ->add('nbreChbreSingle')
                ->add('nbreChbreDouble')
                ->add('prixTotal')
                ->add('refClientFk',EntityType::class,array(
                    'class'=>'EspritUserBundle:Utilisateur',
                    'choice_label' =>'ref',
                    'multiple'=>false
                ))
                ->add('refHebergementFk',EntityType::class,array(
                    'class'=>'EspritUserBundle:Hebergement',
                    'choice_label' =>'id',
                    'multiple'=>false
                ))
                ->add('refVolFk',EntityType::class,array(
                    'class'=>'EspritUserBundle:Vol',
                    'choice_label' =>'ref',
                    'multiple'=>false
                ))
        ->add('ajouter reservation',SubmitType::class);

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\UserBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'esprit_userbundle_reservation';
    }


}
