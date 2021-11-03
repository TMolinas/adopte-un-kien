<?php

namespace App\Controller\Admin;

use App\Entity\EleveurSpa;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
}
