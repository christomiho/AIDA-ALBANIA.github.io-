<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NderhyrjetPunimitokesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataPunimitTokes', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e punimit të tokës'
            ])
            ->add('mjetiPerdorur',null,['label'=>'Mjeti i përdorur'])
            ->add('shperndarjaPunimit',null,['label'=>'Shpërndarja e punimit'])
            ->add('sipPunuar',null,['label'=>'Sip e punuar (ha)'])
            ->add('thellesiaMaxPunimit',null,['label'=>'Thellësia maksimale e punimit (cm)'])
            ->add('tipiPunimit',null,['label'=>'Tipi i punimit'])
            ->add('tipiPunimitArsyeja',null,['label'=>'Arsyeja e tipit të punimit'])
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
            'data_class' => 'AiadBundle\Entity\NderhyrjetPunimitokes'
        ));
    }
}
