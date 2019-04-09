<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraPraisAntofageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataPraisAntofage', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('perqindjeLulePrekura',null,['label'=>'(%) e luleve të prekura'])
            ->add('ratioPerqindjeluleprekuraFormagjalla',null,['label'=>'(%) e luleve të prekura / forma të gjalla'])
            ->add('ratioPraisantofageLastar',null,['label'=>'Prais antofage / lastarë totalë'])
            ->add('perqindjeLastareinfektuar',null,['label'=>'(%) e lastarëve të infektuar'])
            ->add('perqindjeVezenecelje',null,['label'=>'(%) e vezëve në çelje'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraPraisAntofage'
        ));
    }
}
