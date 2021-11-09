<?php

namespace App\Controller\Admin;

use App\Admin\Field\AdresseField;
use App\Entity\Adoptant;
use App\Form\AdresseType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdoptantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adoptant::class;
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
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('userName'),
            EmailField::new('email'),
            TextField::new('plainPassword')->hideOnIndex(),
            AdresseField::new('adresse')
        ];
    }
}
