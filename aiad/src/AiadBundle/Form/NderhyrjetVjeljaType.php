<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NderhyrjetVjeljaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataVjeljes', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vjeljes'
            ])
            ->add('llojiUllinjve',null,['label'=>'Lloji i ullinjve'])
            ->add('menyraVjeljes',null,['label'=>'Mënyra e vjeljes'])
            ->add('cilesiaVajit',null,['label'=>'Cilësia e vajit'])
            ->add('vjeljaDestinacioni',null,['label'=>'Destinacioni i vjeljes'])
            ->add('prejardhjaFrutit',null,['label'=>'Prejardhja e frutit'])
            ->add('rendimenti',null,['label'=>'Rendimenti (kg/ha)'])
            ->add('indeksiPjekjes',null,['label'=>'Indeksi i pjekjes'])
            ->add('perqindjeRendimentiYndyror',null,['label'=>'Rendimenti yndyror (%)'])
            ->add('perqindjeAciditeti',null,['label'=>'Aciditeti (%)'])
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
            'data_class' => 'AiadBundle\Entity\NderhyrjetVjelja'
        ));
    }
}
