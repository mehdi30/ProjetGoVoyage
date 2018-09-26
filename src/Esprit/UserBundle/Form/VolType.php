<?php

namespace Esprit\UserBundle\Form;

use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('villedepart',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
            =>"form-control")))
            ->add('villearrivee',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('datedepartaller')
            ->add('datearriveealler')
            ->add('heuredepart',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('numvol',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('typeavion',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('cieAerienne',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('duree',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))

            ->add('nbrplaceeco',IntegerType::class,array("attr"
        => array('placeholder'
        => '',"style"
        => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
        =>"form-control")))
            ->add('nbrplaceaffaire',IntegerType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('tarif',IntegerType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('typevol',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('datedepartretour')
            ->add('datearriveeretour')
            ->add('heuredepartr',TextType::class, array("attr"
            => array('placeholder'
                => '',"style"
                => "margin-left:22% ; margin-right:30% ; cursor: pointer; border:3px solid #d3d3d3;","class"
                =>"form-control")))
            ->add('save',SubmitType::class);

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\UserBundle\Entity\Vol'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'esprit_userbundle_vol';
    }


}
