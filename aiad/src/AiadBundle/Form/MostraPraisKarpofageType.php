<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraPraisKarpofageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataPraisKarpofage', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('perqindjeFrutaprekuraFormategjalla',null,['label'=>'(%) e frutave të prekura me forma të gjalla'])
            ->add('perqindjeVezetecelura',null,['label'=>'(%) e vezëve të çelura'])
            ->add('perqindjeVezebosh',null,['label'=>'(%) e vezëve bosh'])
            ->add('ratioFrutanetoketotalPeme',null,['label'=>'Fruta të rëna në tokë total / pemë'])
            ->add('ratioFrutanetokepraisPeme',null,['label'=>'Fruta të rëna në tokë nga Prais / pemë'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraPraisKarpofage'
        ));
    }
}
