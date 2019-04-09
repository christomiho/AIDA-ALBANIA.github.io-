<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NderhyrjetKrasitjeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataKrasitjes', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e krasitjes'
            ])
            ->add('tipiKrasitjes',null,['label'=>'Tipi i krasitjes'])
            ->add('kohezgjatja',null,['label'=>'Kohëzgjatja'])
            ->add('mjetetPerdorura',null,['label'=>'Mjetet e përdorura'])
            ->add('produktiDizinfektim',null,['label'=>'Produkti i përdorur për dizinfektim'])
            ->add('dataEliminimiMbetjeve', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e eleminimit të mbetjeve'
            ])
            ->add('menyraEliminimit',null,['label'=>'Mënyra e eleminimit të mbetjeve'])
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
            'data_class' => 'AiadBundle\Entity\NderhyrjetKrasitje'
        ));
    }
}
