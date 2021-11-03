<?php

namespace App\Controller;

use App\Entity\EleveurSpa;
use App\Form\InscriptionESpaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class InscriptionESpaController extends AbstractController
{
    /**
     * @Route("/inscription_e_spa", name="inscription_e_spa_index")
     */
    public function index(): Response
    {
        return $this->render('inscription_e_spa/index', [
            'controller_name' => 'InscriptionESpaController',
        ]);
    }

    /**
     * @Route("/inscription_e_spa/new", name="inscription_eleveur")
     */
    public function new(Request $request, EntityManagerInterface $em): Response


    {
        $inscriptionESpa= new EleveurSpa();
        $form=$this->createForm(InscriptionESpaType::class,$inscriptionESpa);


        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em->persist($inscriptionESpa);
            $em->flush();

            return  $this->redirectToRoute ('about');
        }

        return $this->render('inscription_e_spa/registrationEleveur.html.twig',[
            'form'=>$form->createView(),
        ]);
    }


}
