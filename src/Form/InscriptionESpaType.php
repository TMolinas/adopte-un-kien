<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class InscriptionESpaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userName',TextType::class,['label'=> 'entrez votre nom'])
            ->add('email',EmailType::class,['label'=> 'entrez votre email'])
            ->add('telephone',TextType::class,['label'=> 'entrez votre telephone'])
            ->add('password',PasswordType::class,['label'=> 'entrez votre mot de passe'])
            ->add('isSpa',CheckboxType::class,[
                'required'=>false,
            ])
            ->add('nameSociety',TextType::class,['label'=> 'entrez le nom de votre societer'])
            ->add('siret',TextType::class,['label'=> 'entrez votre numero de siret'])
            ->add('adresse',TextType::class,['label'=> 'entrez votre adresse'])
            ->add('submit',SubmitType::class);


    }


}
