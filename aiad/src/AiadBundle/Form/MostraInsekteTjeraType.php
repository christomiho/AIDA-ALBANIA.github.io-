<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraInsekteTjeraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataInsekteTjera', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('ratioPambukuFormagjallaLule',null,['label'=>'Pambuku: Forma të gjalla / Lule'])
            ->add('perqindjeAranjeloLastarprekur',null,['label'=>'Aranjelo: (%) e lastarëve të prekur'])
            ->add('aranjeloLarvagjateshkundjes',null,['label'=>'Aranjelo: Nr i larvave gjatë shkundjes'])
            ->add('ratioGusanobardheTerriturGrackadite',null,['label'=>'Gusano të bardhë: Të rritur / Gracka dhe ditë'])
            ->add('ratioGusanobardheVrimadaljePeme',null,['label'=>'Gusano të bardhë: Nr i vrimave dalëse / Pemë'])
            ->add('perqindjeGusanobardhePememesimptoma',null,['label'=>'Gusano të bardhë: (%) e pemëve me simptoma'])
            ->add('ratioMushkonjakuroresTerriturGrackedite',null,['label'=>'Mushkonja e kurorës: Të rritur / Gracka dhe ditë'])
            ->add('ratioMushkonjakuroresDegezaprekuraPeme',null,['label'=>'Mushkonja e kurorës: Degëza të prekura / Pemë'])
            ->add('ratioZeuseraTerriturGrackedite',null,['label'=>'Zeusera: Të rritur / Gracka dhe ditë'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraInsekteTjera'
        ));
    }
}
