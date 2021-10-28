<?php

namespace App\Controller\Admin;

use App\Entity\ElveursSpa;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ElveursSpaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ElveursSpa::class;
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
