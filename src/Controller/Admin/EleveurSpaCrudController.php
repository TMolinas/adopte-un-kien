<?php

namespace App\Controller\Admin;

use App\Admin\Field\AdresseField;
use App\Entity\EleveurSpa;
use App\Form\AdresseType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EleveurSpaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EleveurSpa::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            BooleanField::new('isSpa'),
            TextField::new('nameSociety'),
            TextField::new('siret'),
            TextField::new('userName'),
            EmailField::new('email'),
            TextField::new('plainPassword')->hideOnIndex(),
            AdresseField::new('adresse')


        ];
    }
}
