<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Adoptant;
use App\Entity\Adresse;
use App\Entity\Annonce;
use App\Entity\Departement;
use App\Entity\Dog;
use App\Entity\EleveurSpa;
use App\Entity\Photo;
use App\Entity\Ville;
use App\Repository\AdminRepository;
use App\Repository\AdoptantRepository;
use App\Repository\AdresseRepository;
use App\Repository\AnnonceRepository;
use App\Repository\DepartementRepository;
use App\Repository\DogRepository;
use App\Repository\EleveurSpaRepository;
use App\Repository\PhotoRepository;
use App\Repository\UserRepository;
use App\Repository\VilleRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{

    private AdminRepository $adminRepository;
    private AdoptantRepository $adoptantRepository;
    private AdresseRepository $adresseRepository;
    private AnnonceRepository $annonceRepository;
    private DepartementRepository $departementRepository;
    private DogRepository $dogRepository;
    private EleveurSpaRepository $eleveurSpaRepository;
    private PhotoRepository $photoRepository;
    private UserRepository $userRepository;
    private VilleRepository $villeRepository;

    /**
     * @param AdminRepository $adminRepository
     * @param AdoptantRepository $adoptantRepository
     * @param AdresseRepository $adresseRepository
     * @param AnnonceRepository $annonceRepository
     * @param DepartementRepository $departementRepository
     * @param DogRepository $dogRepository
     * @param EleveurSpaRepository $eleveurSpaRepository
     * @param PhotoRepository $photoRepository
     * @param UserRepository $userRepository
     * @param VilleRepository $villeRepository
     */
    public function __construct(AdminRepository $adminRepository, AdoptantRepository $adoptantRepository, AdresseRepository $adresseRepository, AnnonceRepository $annonceRepository, DepartementRepository $departementRepository, DogRepository $dogRepository, EleveurSpaRepository $eleveurSpaRepository, PhotoRepository $photoRepository, UserRepository $userRepository, VilleRepository $villeRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->adoptantRepository = $adoptantRepository;
        $this->adresseRepository = $adresseRepository;
        $this->annonceRepository = $annonceRepository;
        $this->departementRepository = $departementRepository;
        $this->dogRepository = $dogRepository;
        $this->eleveurSpaRepository = $eleveurSpaRepository;
        $this->photoRepository = $photoRepository;
        $this->userRepository = $userRepository;
        $this->villeRepository = $villeRepository;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $nbAdmins = $this->adminRepository->countElements();
        $nbAdoptants = $this->adoptantRepository->countElements();
        $nbAdresses = $this->adresseRepository->countElements();
        $nbAnnonces = $this->annonceRepository->countElements();
        $nbDepartements = $this->departementRepository->countElements();
        $nbDogs = $this->dogRepository->countElements();
        $nbEleveurSpas = $this->eleveurSpaRepository->countElements();
        $nbPhotos = $this->photoRepository->countElements();
        $nbUsers = $this->userRepository->countElements();
        $nbVilles = $this->villeRepository->countElements();
        return $this->render('admin/admin-dashboard.html.twig', [
            'nbAdmins' =>$nbAdmins,
            'nbAdoptants' =>$nbAdoptants,
            'nbAdresses' =>$nbAdresses,
            'nbAnnonces' =>$nbAnnonces,
            'nbDepartements' =>$nbDepartements,
            'nbDogs' =>$nbDogs,
            'nbEleveurSpas' =>$nbEleveurSpas,
            'nbPhotos' =>$nbPhotos,
            'nbUsers' =>$nbUsers,
            'nbVilles' =>$nbVilles
        ]);

        // redirect to some CRUD controller
//        $routeBuilder = $this->get(AdminUrlGenerator::class);
//
//        return $this->redirect($routeBuilder->setController(EleveurSpaCrudController::class)->generateUrl());
//
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

            MenuItem::section('EleveurSpa'),
            MenuItem::linkToCrud('EleveurSpa', 'fa fa-tags', EleveurSpa::class),

            MenuItem::section('Photo'),
            MenuItem::linkToCrud('Photo', 'fa fa-tags', Photo::class),

            MenuItem::section('Ville'),
            MenuItem::linkToCrud('Ville', 'fa fa-tags', Ville::class),

       ];
    }
}
