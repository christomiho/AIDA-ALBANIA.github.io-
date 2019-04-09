<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraBarrenijoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataBarrenijo', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('ratioVrimahyrjeNjesimostre',null,['label'=>'Nr i vrimave të hyrjes / Njësi mostre'])
            ->add('ratioVrimadaljeNjesimostre',null,['label'=>'Nr i vrimave të daljes / Njësi mostre'])
            ->add('perqindjeLastarprekur',null,['label'=>'(%) e lastarëve të prekur'])
            ->add('ratioLastarprekurFormagjalla',null,['label'=>'(%) e lastarëve të prekur / Forma të gjalla'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraBarrenijo'
        ));
    }
}
