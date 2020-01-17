<?php

namespace App\Form;

use App\Entity\configuration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class configFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tax_rate', NumberType::class,[
                'label' => 'Tax rate'
            ])
            ->add('tax_flag', CheckboxType::class, [
                'label' => 'Tax inclusion'
            ])
            ->add('global_discount', NumberType::class,[
                'label' => 'Global discount'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => configuration::class,
        ]);
    }
}
