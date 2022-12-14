<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PaisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion',TextType::class)
            ->add('abrev',TextType::class)
            ->add('activo', ChoiceType::class, 
                [
                    'choices' =>
                        [
                            'SI' => true,
                            'NO' => false,
                        ],
                ])
            ->add('Aceptar',SubmitType::class, array('label'=>'Nuevo pais'));
    }
    /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pais'
        ));
    }

    /**
     * {@inheritdoc}
     */

    public function getBlockPrefix()
    {
        return 'appbundle_pais';
    }


}
