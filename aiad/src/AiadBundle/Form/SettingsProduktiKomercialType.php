<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsProduktiKomercialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emri',null,['label'=>'Emri i produktit komercial'])
            ->add('pastertia',null,['label'=>'Pastërtia'])
            ->add('perdorimiRekomanduar',null,['label'=>'Përdorimi i rekomanduar'])
            ->add('lendaAktive',null,['label'=>'Lënda aktive'])
            ->add('firma',null,['label'=>'Firma e produktit'])
            ->add('kategoriaProduktitKomercial',null,['label'=>'Kategoria e produktit'])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\SettingsProduktiKomercial'
        ));
    }
}
