<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nuberInStreet',NumberType::class,['label'=> 'le numero de votre rue'])
            ->add('nameOf7Street',TextType::class,['label'=> 'entrez votre le nom de la rue'])
            ->add('ville',EntityType::class,[
                'label'=> 'entrez votre ville',
                'class' => Ville::class,
                'choice_label' => 'cityName'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
