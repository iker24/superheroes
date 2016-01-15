<?php

namespace uni\Bundle\superheroesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SUPERHEROEType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('habilidades')
            ->add('edad')
            ->add('sexo')
            ->add('ALLTIPOS')
            ->add('ALLZONAS')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'uni\Bundle\superheroesBundle\Entity\SUPERHEROE'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'uni_bundle_superheroesbundle_superheroe';
    }
}
