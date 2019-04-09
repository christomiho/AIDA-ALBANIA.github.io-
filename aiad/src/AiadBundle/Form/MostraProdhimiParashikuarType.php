<?php

namespace AiadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MostraProdhimiParashikuarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataProdhimiParashikuar', 'date', [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ],
                'label'=>'Data e vëzhgimit'
            ])
            ->add('ratioMeslulezimLastartotal',null,['label'=>'Mesatarja e lulëzimit / lastarë total'])
            ->add('ratioMeslulezimfertilLastartotal',null,['label'=>'Mesatarja e lulëzimit fertil/ lastarë total'])
            ->add('ratioFrutaparareniesLastaretotal',null,['label'=>'Fruta para rënies parë / lastarë total'])
            ->add('ratioFrutapasreniesLastaretotal',null,['label'=>'Fruta pas rënies parë / lastarë total'])
            ->add('ratioFrutaparareniesdyteLastaretotal',null,['label'=>'Fruta para rënies dytë / lastarë total'])
            ->add('peshaMesatareFrutit',null,['label'=>'Pesha mesatare e frutit (gr)'])
            ->add('parashikimiProdhimitHa',null,['label'=>'Parashikimi i prodhimit (Kg/ha)'])
            ->add('parashikimiProdhimitParcele',null,['label'=>'Parashikimi i prodhimit (Kg/Parcelë)'])
            ->add('perqindjeLuleshFertile',null,['label'=>'Lule fertile (%)'])
            ->add('gjatesiaFrutit',null,['label'=>'Gjatësia e frutit (cm)'])
            ->add('diametriFrutit',null,['label'=>'Diametri i frutit (cm)'])
            ->add('parcela')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AiadBundle\Entity\MostraProdhimiParashikuar'
        ));
    }
}
