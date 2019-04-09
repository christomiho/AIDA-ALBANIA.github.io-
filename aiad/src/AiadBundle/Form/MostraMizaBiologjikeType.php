<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraMizaBiologjikeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataMizaBiologjike', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'

            ])
            ->add('frutaVezhguara',null,['label'=>'Fruta të vëzhguara'])
            ->add('frutaPickuara',null,['label'=>'Fruta të pickuara'])
            ->add('ratioPickimepaveze',null,['label'=>'Pickime pa vezë / 100 fruta'])
            ->add('ratioVezetegjalla',null,['label'=>'Vezë të gjalla / 100 fruta'])
            ->add('ratioVezetevdekura',null,['label'=>'Vezë të vdekura / 100 fruta'])
            ->add('ratioLarvategjalla',null,['label'=>'Larva të gjalla / 100 fruta'])
            ->add('ratioLarvatengordhura',null,['label'=>'Larva të ngordhura / 100 fruta'])
            ->add('ratioNimfategjalla',null,['label'=>'Nimfat e gjalla / 100 fruta'])
            ->add('ratioNimfatengordhura',null,['label'=>'Nimfat e ngordhura / 100 fruta'])
            ->add('ratioGaleribosh',null,['label'=>'Galeri të lëna bosh / 100 fruta'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraMizaBiologjike'
        ));
    }
}
