<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NderhyrjetGrackaMasiveType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataNderhyrjes', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e ndërhyrjes'
            ])
            ->add('tipi',null,['label'=>'Tipi'])
            ->add('objektiviSemundjes',null,['label'=>'Objektivi i sëmundjes'])
            ->add('tipiGrackesDifuzorit',null,['label'=>'Tipi i grackës ose difuzorit'])
            ->add('numriGrackave',null,['label'=>'Nr i grackave ose difuzorve për hektarë'])
            ->add('ferromoni',null,['label'=>'Ferromoni ose lënda aktive'])
            ->add('ferromoniKompaniaProdhuese',null,['label'=>'Kompania prodhuese'])
            ->add('ferromoniKompaniaShperndarese',null,['label'=>'Kompania shpërndarëse'])
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
            'data_class' => 'AiadBundle\Entity\NderhyrjetGrackaMasive'
        ));
    }
}
