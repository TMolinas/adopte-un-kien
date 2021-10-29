<?php

namespace App\Controller;

use App\Entity\Adoptant;
use App\Entity\Annonce;
use App\Form\AdoptantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdoptDogController extends AbstractController
{
    /**
     * @Route("/adopt/dog", name="adopt_dog")
     */
    public function index(): Response
    {
        return $this->render('adopt_dog/index.html.twig', [
            'controller_name' => 'AdoptDogController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Annonce::class);
        $annonces = $repo->findAll();
        return $this->render('adopt_dog/home.html.twig', [
            'annonces' => $annonces]);
    }

    /**
     * @Route("/registration/adoptant", name="registrationAdoptant")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function registrationAdoptant(Request $request, EntityManagerInterface $em): Response
    {
        $adoptant = new Adoptant();

        $formAdoptant = $this->createForm(AdoptantType::class, $adoptant);
        $formAdoptant->handleRequest($request);

        if ($formAdoptant->isSubmitted() && $formAdoptant->isValid()) {
            $em->persist($adoptant);
            $em->flush();

            return $this->redirectToRoute('home');
    }

        return $this->render('adopt_dog/registrationAdoptant.html.twig', [
            'formAdoptant' => $formAdoptant->createView()
        ]);
    }




}
