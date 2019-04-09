<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParcelaAgronomikeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siperfaqja','number', [
                'attr'=> ['step'=>'0.01'],
                'label'=>'Sipërfaqja (ha)'
            ])
            ->add('pjerresia', 'number', [
                'attr'=> ['step'=>'0.001'],
                'label'=>'Pjerrësia %'
            ])
            ->add('orientimi')
            ->add('ujitje', null ,['label'=>'Me ujitje/Pa ujitje'])
            ->add('sistemiUjitje',null,['label'=>'Sistemi i ujitjes'])
            ->add('origjinaUjit',null,['label'=>'Origjina e ujit'])
            ->add('cilesiaUjit',null,['label'=>'Cilësia e ujit'])
            ->add('mbulesaBimoreTokes',null,['label'=>'Mbulesa bimore e tokës'])
            ->add('llojiMbuleses',null,['label'=>'Lloji i mbulesës'])
            ->add('parcela')
            ->add('vezhgimeTjera','textarea',['label'=>'Vëzhgime të tjera'])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\ParcelaAgronomike'
        ));
    }
}
