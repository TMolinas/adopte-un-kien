<?php

namespace App\Form;

use App\Entity\Dog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameOfDog', TextType::class, [
                'label' => 'Nom du chien'
            ])
            ->add('breed', TextType::class, ['label' => 'race'])
            ->add('lof')
            ->add('description')
            ->add('sociability', TextType::class, ['label' => 'Sociablilité'])
            ->add('canBeAdopted')
            ->add('age')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dog::class,
        ]);
    }
}
