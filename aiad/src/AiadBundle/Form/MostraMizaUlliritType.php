<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraMizaUlliritType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataMizaUllirit', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('ratioNrmizaKurthdite', null,['label'=>'Nr mizave / kurth dhe ditë'])
            ->add('nrFemraVezhguara', null,['label'=>'Nr i femrave të vëzhguara'])
            ->add('perqindjeFemraveze', null,['label'=>'(IF) (%) Femra me vezë'])
            ->add('indeksiRrezikut', null,['label'=>'(IR) Indeksi i rrezikut'])
            ->add('ratioNrmizaPllakedite', null,['label'=>'Nr mizave / pllakë dhe ditë'])
            ->add('perqindjeFrutaPickuara', null,['label'=>'(%) totale e frutave të pickuara'])
            ->add('perqindjeFrutaMizegjalle', null,['label'=>'(%)e frutave me mizë të gjallë'])
            ->add('frutaVrimedaljemize', null,['label'=>'Fruta me vrimën e daljes së mizës'])
            ->add('perqindjeMizaparazite', null,['label'=>'(%) miza parazite'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraMizaUllirit'
        ));
    }
}
