<?php

namespace App\Controller;

use App\Entity\ElveursSpa;
use App\Form\InscriptionESpaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


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
    public function new(): Response
    {   $inscriptionESpa= new ElveursSpa();
        $form=$this->createForm(InscriptionESpaType::class,$inscriptionESpa);

        return $this->render('inscription_e_spa/registrationElveur.html.twig',[
            'form'=>$form->createView(),
        ]);
    }


}
