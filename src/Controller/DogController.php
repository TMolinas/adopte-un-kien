<?php

namespace App\Controller;

use App\Entity\Adoptant;
use App\Entity\Dog;
use App\Form\AdoptantType;
use App\Form\DogType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DogController extends AbstractController
{


    /**
     * @Route("/dog/add", name="dog_add")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function registrationAdoptant(Request $request, EntityManagerInterface $em): Response
    {
        $dog = new Dog();


        $formDog = $this->createForm(DogType::class, $dog);
        $formDog->handleRequest($request);

        if ($formDog->isSubmitted() && $formDog->isValid()) {

            $em->persist($dog);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('dog/ajouter.html.twig', [
            'formDog' => $formDog->createView()
        ]);

    }
}
