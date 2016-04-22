<?php

namespace PublicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class concesionarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('provincia')
            ->add('localidad')
            ->add('telefono')
            ->add('direccion')
            ->add('codigopostal')
            ->add('concesionario')
            ->add('foto')
            ->add('posicion')
            ->add('marca')
            ->add('website')
            ->add('descripcion')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PublicBundle\Entity\concesionario'
        ));
    }
}
