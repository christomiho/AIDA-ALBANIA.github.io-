<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraFenologjiaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataFenologjia', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('sytheDimerore', ChoiceType::class, array(
              'choices'=>array(
                  'Jo Prezent'=>0,
                  'Prezente'=>1,
                  'Stadi Mbizotërues'=>2,
              ),
                'choices_as_values'=>true,
                'label'=>'Sythe dimërore'
            ))
            ->add('sytheZhvillim', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Sythe në zhvillim'
            ))
            ->add('lulezimi', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Lulëzimi'
            ))
            ->add('lidhjaFrutit', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Lidhja e frutit'
            ))
            ->add('ngjyreJeshile', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Ngjyrë jeshile'
            ))
            ->add('ngjyreVerdhe', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Ngjyrë e verdhë'
            ))
            ->add('ngjyreViolet', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Ngjyrë violet'
            ))
            ->add('ngjyreZeze', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Ngjyrë e zezë'
            ))
            ->add('frutTejpjekur', ChoiceType::class, array(
                'choices'=>array(
                    'Jo Prezent'=>0,
                    'Prezente'=>1,
                    'Stadi Mbizotërues'=>2,
                ),
                'choices_as_values'=>true,
                'label'=>'Frut i tejpjekur',
            ))
            ->add('lulezimiPerqindje','number',['label'=>'Përqindja e lulëzimit (%)'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraFenologjia'
        ));
    }
}
