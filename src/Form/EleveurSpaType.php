<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\EleveurSpa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveurSpaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('telephone')
            ->add('roles')
            ->add('password')
            ->add('isSpa')
            ->add('nameSociety')
            ->add('siret')
            ->add('adresse', EntityType::class, [
                'class' => Adresse::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EleveurSpa::class,
        ]);
    }
}
