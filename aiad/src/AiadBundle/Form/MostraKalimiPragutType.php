<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MostraKalimiPragutType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataKalimipragut', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('kocinija', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Kocinija: kalon pragun'
            ))
            ->add('praisFilofage', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Prais filofage: kalon pragun'
            ))
            ->add('praisAntofage', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Prais antofage: kalon pragun'
            ))
            ->add('praisKarpofage', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Prais karpofage: kalon pragun'
            ))
            ->add('praisStadiLarvor', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Prais stadi larvor: kalon pragun'
            ))
            ->add('miza', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Miza: kalon pragun'))
            ->add('barrenijo', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Barrenijo: kalon pragun'
            ))
            ->add('syriPalloit', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Syri i palloit: kalon pragun'
            ))
            ->add('verticilium', ChoiceType::class, array(
                'choices'=>array(
                    'Jo'=>0,
                    'Po'=>1,
                    'Pa monstër'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Verticilium: kalon pragun'
            ))
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraKalimiPragut'
        ));
    }
}
