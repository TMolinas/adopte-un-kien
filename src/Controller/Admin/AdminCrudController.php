<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class AdminCrudController extends AbstractCrudController
{
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function createLinks()
    {
        // if your application only contains one Dashboard, it's enough
        // to define the controller related to this URL
        $url = $this->adminUrlGenerator
            ->setController(AdminUrlGenerator::class)
            ->setAction(Action::INDEX)
            ->generateUrl();

        // some actions may require passing additional parameters
        $url = $this->adminUrlGenerator
            ->setController(AdminCrudController::class)
            ->setAction(Action::NEW)
            ->generateUrl();
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('userName'),
            EmailField::new('email'),
            TextField::new('plainPassword')->hideOnIndex(),
        ];
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
