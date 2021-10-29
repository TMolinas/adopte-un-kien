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

         return $this->redirect($routeBuilder->setController(ElveursSpaCrudController::class)->generateUrl()); }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Adopte Un Kien Corp.')

            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<img src="notion://www.notion.so/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F65965ac1-0238-487c-824f-2d52acd6deeb%2Fspa.png?table=block&id=88102fe9-6880-4a5b-af85-9b75e1b7711d&spaceId=9a105652-3b03-4cae-8a5c-0ace828ec209&width=2000&userId=42038239-67ee-4634-8a7e-5c2a189ec1d9&cache=v2"> Adopte Un Kien <span class="text-small">Corp.</span>')

            // the path defined in this method is passed  to the Twig asset() function
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()

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
