<?php

namespace Esprit\UserBundle\Form;

use blackknight467\StarRatingBundle\Form\RatingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HebergementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('adresse')
            ->add('adressemail')
            ->add('numerotel')
            ->add('type')
            ->add('nbetoile')
            ->add('prixsingle')
            ->add('prixdouble')
            ->add('prixenfant')
            ->add('prixnuit')
            //->add('idproprietaire')
            ->add('image', FileType::class,array('data_class'=>null))
            ->add('rating', RatingType::class, [
                'label' => 'Rating',
                'stars'=>5
            ])
            ->add('submit',SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\UserBundle\Entity\Hebergement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'esprit_userbundle_hebergement';
    }


}
