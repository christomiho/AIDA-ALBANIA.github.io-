<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TabelaPermbledheseAplikimSemundjeshType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataTrajnimit', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e aplikimit'
            ])
            ->add('numriAplikimit',null,['label'=>'Numri i aplikimit'])
            ->add('sasiaTrajtimit',null,['label'=>'Sasia e trajtimit'])
            ->add('siperfaqjaTrajtuarHektar',null,['label'=>'Sipërfaqja e trajtuar (ha)'])
            ->add('siperfaqjaTrajtuarPerqindje',null,['label'=>'Sipërfaqja e trajtuar (%)'])
            ->add('presioniTrajtimit',null,['label'=>'Presioni i trajtimit'])
            ->add('shpejtesiaTrajtimit',null,['label'=>'Shpejtësia e trajtimit'])
            ->add('shperndarjaTrajtimit',null,['label'=>'Shpërndarja e trajtimit'])
//            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\TabelaPermbledheseAplikimSemundjesh'
        ));
    }
}
