<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AplikimeSemundjeTedhenaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataAplikimit', 'date')
            ->add('produktiKomercialDoza')
//            ->add('materialiAktivLendaAktive')
//            ->add('materialiAktivPastertia')
//            ->add('emriFirmes')
            ->add('vezhgime')
            ->add('arsyejaAplikimit1')
            ->add('arsyejaAplikimit2')
            ->add('justifikimi')
//            ->add('produktiKomercialNjesia')
            ->add('produktiKomercialEmri')
//            ->add('llojiAplikimit')
//            ->add('referimiTabelaPermbledhese')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\AplikimeSemundjeTedhena'
        ));
    }
}
