<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParcelaKultivariType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('varietetiParesor',null,['label'=>'Varieteti parësor (I)'])
            ->add('dataMbjelljeVar1', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e mbjelljes Var I'


            ])
            ->add('varietetiDytesor',null,['label'=>'Varieteti dytësor (II)'])
            ->add('dataMbjelljeVar2', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e mbjelljes Var II'
            ])
            ->add('siperfaqeVar2',null,['label'=>'Sip. e mbjellë e var. II (ha)'])
            ->add('distanca',null,[
                'label'=>'Distanca (m x m)'

            ])
            ->add('dendesia',null,[
                'label'=>'Dendësia (pemë / ha)',

            ])
            ->add('nrKembePeme',null,['label'=>'Nr i këmbëve për pemë'])
            ->add('formaKurores',null,['label'=>'Forma e kurorës'])
            ->add('diametriKurores',null,['label'=>'Diametri i kurorës (m)'])
            ->add('lartesiaKurores',null,['label'=>'Lartësia e kurorës (m)'])
            ->add('vezhgimeTjera',null,['label'=>'Vëzhgime të tjera'])
            ->add('parcela')





        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\ParcelaKultivari'
        ));
    }
}
