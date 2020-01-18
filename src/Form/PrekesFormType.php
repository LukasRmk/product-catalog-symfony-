<?php

namespace App\Form;

use App\Entity\Preke;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PrekesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pavadinimas', TextType::class,[
                'label' => 'Pavadinimas '
            ])
            ->add('SKU', TextType::class, [
                'label' => 'SKU '
            ])
            ->add('status', TextType::class,[
                'label' => 'Likučio statusas '
            ])
            ->add('base_price',  NumberType::class, [
                'invalid_message' => 'Kaina nurodoma skaiciais',
                'label' => 'Paprasta kaina '
            ])
            ->add('special_price',  NumberType::class, [
                'invalid_message' => 'Kaina nurodoma skaiciais',
                'label' => 'Speciali kaina (jei nėra nurodyti 0) '
            ])
            ->add('image', TextType::class,[
                'label' => 'Piešinuko URL adresas ',
            ])
            ->add('description', TextType::class,[
                'label' => 'Aprašymas ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Preke::class,
        ]);
    }
}
