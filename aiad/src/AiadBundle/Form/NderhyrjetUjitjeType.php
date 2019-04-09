<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NderhyrjetUjitjeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataUjitjes', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e ujitjes'
            ])
            ->add('origjinaUjit',null,['label'=>'Origjina e ujit'])
            ->add('sistemiUjitjes',null,['label'=>'Sistemi i ujitjes'])
            ->add('cilesiaUjit',null,['label'=>'Cilësia e ujit'])
            ->add('sasiaUjit',null,['label'=>'Sasia e ujit (m3/ha)'])
            ->add('arsyejaUjitjes',null,['label'=>'Arsyeja e ujitjes'])
            ->add('vezhgime',null,['label'=>'Vëzhgime'])
            ->add('parcela')

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\NderhyrjetUjitje'
        ));
    }
}
