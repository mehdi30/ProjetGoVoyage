<?php
/**
 * Created by PhpStorm.
 * User: Imen
 * Date: 19/11/2017
 * Time: 00:30
 */

namespace Esprit\UserBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RHoteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options); // TODO: Change the autogenerated stub
        $builder


            ->add('type')
            ->add('dateCreation')
            ->add('dateArriveeH')
            ->add('dateSortieH')

            ->add('nbreNuits')

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


            ->add('Submit',SubmitType::class);


        ; }
    public function getName()
    {return 'Reservation'; }



}