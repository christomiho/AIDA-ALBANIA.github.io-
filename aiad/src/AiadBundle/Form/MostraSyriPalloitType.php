<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraSyriPalloitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataSyriPalloit', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('perqindjeLastareinfektuar',null,['label'=>'(%) e lastarëve të infektuar'])
            ->add('perqindjeGjetheInfektuara',null,['label'=>'(%) e gjetheve të infektuara'])
            ->add('perqindjeDemtuesInkubuarGjethe',null,['label'=>'(%) e dëmtuesit yë inkubuar në gjethet'])
            ->add('perqindjeFletaSimptoma',null,['label'=>'(%) e fletëve me simptoma'])
            ->add('kushteFavorshme',null,['label'=>'Kushte të favorshme'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraSyriPalloit'
        ));
    }
}
