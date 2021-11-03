<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADOPTANT")
 */
class AdoptantController extends AbstractController
{
    /**
     * @Route("/adoptant", name="adoptant")
     */
    public function index(): Response
    {
        $adoptant = $this->getUser();
        return $this->render('adoptant/index.html.twig', [
            'controller_name' => 'AdoptantController',
        ]);
    }
}
