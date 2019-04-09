<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraSemundjeTjeraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataSemundjeTjera', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('perqindjeFrutasapunifikuaraFrutasimptoma',null,['label'=>'Fruta të sapunifikuara: (%) e frutave me simptoma'])
            ->add('perqindjeEskudeteFrutasimptoma',null,['label'=>'Eskudete: (%) e frutave me simptoma'])
            ->add('perqindjeLepraFrutasimptoma',null,['label'=>'Lepra: (%) e frutave me simptoma'])
            ->add('perqindjeFrutakalburaFrutasimptoma',null,['label'=>'Fruta të kalbura: (%) e frutave me simptoma'])
            ->add('turbekulozaSimptoma',null,['label'=>'Turbekuloza: Simptoma (0-3)'])
            ->add('asfiksiaRrenjevePemeinfektuara',null,['label'=>'Asfiksia e rrënjeve: Nr i pemëve të infektuara'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraSemundjeTjera'
        ));
    }
}
