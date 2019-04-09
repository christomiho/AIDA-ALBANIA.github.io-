<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NderhyrjetMbulesaTokesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataMbulesaTokes', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e ndërhyrjes'
            ])
            ->add('speciaMbjelle',null,['label'=>'Specia e mbjellë'])
            ->add('dozaMbjelljes',null,['label'=>'Doza e mbjelljes (kg/ha)'])
            ->add('sipMbjelljes',null,['label'=>'Sipërfaqja e mbjellë (%)'])
            ->add('dataEliminimit', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e eliminimit'
            ])
            ->add('menyraEliminimit',null,['label'=>'Mënyra e eleminimit'])
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
            'data_class' => 'AiadBundle\Entity\NderhyrjetMbulesaTokes'
        ));
    }
}
