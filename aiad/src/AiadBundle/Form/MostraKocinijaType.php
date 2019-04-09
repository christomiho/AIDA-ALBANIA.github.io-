<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraKocinijaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataKocinija', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'

            ])
            ->add('ratioAdulttegjallejoparaziteLastar',null,['label'=>'Adult të gjallë jooparazitë / Lastarë'])
            ->add('ratioTegjallatotalLastar',null,['label'=>'Të gjalla (total) / Lastarë'])
            ->add('perqindjeVezetecelura',null,['label'=>'(%) e vezëve të çelura'])
            ->add('perqindjeTerriturParazit',null,['label'=>'(%) e të rriturve parazitë'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraKocinija'
        ));
    }
}
