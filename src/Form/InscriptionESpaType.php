<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class InscriptionESpaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userName', TextType::class, ['label'=> 'Nom'])
            ->add('email', EmailType::class, ['label'=> 'Email'])
            ->add('telephone', TextType::class, ['label'=> 'Téléphone'])
            ->add('plainPassword', PasswordType::class, ['label'=> 'Mot de passe'])
            ->add('isSpa', CheckboxType::class, [
                'required'=>false,
            ])
            ->add('nameSociety', TextType::class, ['label'=> 'Nom de Société'])
            ->add('siret', NumberType::class, ['label'=> 'Numéro de Siret'])
            ->add('adresse', AdresseType::class)
            ->add('submit', SubmitType::class);
    }
}
