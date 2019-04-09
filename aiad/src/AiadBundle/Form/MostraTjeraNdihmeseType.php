<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraTjeraNdihmeseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataTjeraNdihmese', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('perqindjeSkutelistaTerriturparazite',null,['label'=>'Skutelista: (%) e të rrituve parazitë'])
            ->add('perqindjeMetafikusKocinijaparazite',null,['label'=>'Metafikus: (%) e kocinijave parazite'])
            ->add('ratioAnthokorisKocinijaparaziteNjesimostre',null,['label'=>'Anthokoris: nr i kocinijave parazite / njësi mostre'])
            ->add('ratioAgeniaspisTerriturGrackedite',null,['label'=>'Ageniaspis: Nr i të rriturve / gracka dhe ditë'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraTjeraNdihmese'
        ));
    }
}
