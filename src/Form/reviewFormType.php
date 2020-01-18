<?php

namespace App\Form;

use App\Entity\review;
use App\Entity\Preke;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class reviewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $preke = $_GET["prekesID"];
        $builder
            ->add('product_id', HiddenType::class,[
                'label' => 'preke',
                'data' => $preke,
             ])
            ->add('text', TextType::class,[
                'label' => 'Palikite atsiliepimą',
                'required' => false
            ])
            ->add('rate', ChoiceType::class,[
                'label' => 'Kokiu balu įvertintumėtė produktą?',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => review::class,
        ]);
    }
}
