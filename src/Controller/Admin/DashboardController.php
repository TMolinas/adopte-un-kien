<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Adoptant;
use App\Entity\Adresse;
use App\Entity\Annonce;
use App\Entity\Departement;
use App\Entity\Dog;
use App\Entity\ElveursSpa;
use App\Entity\Photo;
use App\Entity\Ville;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ElveursSpaCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Adopte Un Kien Corp.')

            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<img height="50px" width="50px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/0/00/Logo_de_la_SPA_(France).png/813px-Logo_de_la_SPA_(France).png"> Adopte Un Kien <span class="text-small">Corp.</span>')

            // the path defined in this method is passed  to the Twig asset() function
            //->setFaviconPath('favicon.svg')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
//            ->renderSidebarMinimized()

            // by default, all backend URLs include a signature hash. If a user changes any
            // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // triggers an error. If this causes any issue in your backend, call this method
            // to disable this feature and remove all URL signature checks
            ->disableUrlSignatures()

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()
            ;



    }

    public function configureMenuItems(): iterable
    {
       return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Admin'),
            MenuItem::linkToCrud('Admin', 'fa fa-dog', Admin::class),


            MenuItem::section('Adoptant'),
            MenuItem::linkToCrud('Adoptant', 'fa fa-user', Adoptant::class),


            MenuItem::section('Adresse'),
            MenuItem::linkToCrud('Adresse', 'fa fa-user', Adresse::class),


            // links to the 'index' action of the Category CRUD controller
            MenuItem::section('Annonce'),
            MenuItem::linkToCrud('Annonce', 'fa fa-tags', Annonce::class),

            MenuItem::section('Departement'),
            MenuItem::linkToCrud('Departement', 'fa fa-tags', Departement::class),

            MenuItem::section('Dog'),
            MenuItem::linkToCrud('Dog', 'fa fa-tags', Dog::class),

            MenuItem::section('ElveursSpa'),
            MenuItem::linkToCrud('ElveursSpa', 'fa fa-tags', ElveursSpa::class),

            MenuItem::section('Photo'),
            MenuItem::linkToCrud('Photo', 'fa fa-tags', Photo::class),

            MenuItem::section('Ville'),
            MenuItem::linkToCrud('Ville', 'fa fa-tags', Ville::class),



            MenuItem::section('ElveursSpa'),
            MenuItem::linkToDashboard('ElveursSpa', 'fa fa-home'),
            MenuItem::linkToExitImpersonation('Stop impersonation', 'fa fa-exit'),

            MenuItem::section('Photo'),
            MenuItem::linkToDashboard('Photo', 'fa fa-home'),
            MenuItem::linkToExitImpersonation('Stop impersonation', 'fa fa-exit'),


            MenuItem::section('Ville'),
            MenuItem::linkToDashboard('Ville', 'fa fa-home'),
            MenuItem::linkToExitImpersonation('Stop impersonation', 'fa fa-exit'),

       ];
    }
}
