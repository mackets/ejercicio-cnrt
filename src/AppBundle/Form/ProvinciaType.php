<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProvinciaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('descripcion',TextType::class)
        ->add('abrev', TextType::class)
        ->add('pais', EntityType::class,array('class'=>'AppBundle:Pais'))
        ->add('activo', ChoiceType::class,
            [
                'choices'=>
                    [
                        'SI'=>true,
                        'NO'=>false,
                    ],
            ]
        
        )
        ->add('Aceptar',SubmitType::class, array('label'=>'Nueva provincia'));
        
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Provincia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_provincia';
    }


}
