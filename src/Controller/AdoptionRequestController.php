<?php


namespace App\Controller;

use App\Entity\AdoptionRequest;
use App\Entity\Annonce;
use App\Entity\Message;
use App\Entity\User;
use App\Form\MessageType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdoptionRequestController extends AbstractController
{
    /**
     * @Route("/adoption/request", name="adoption_request")
     */
    public function index(UserRepository $userRepository): Response
    {

        $user =  $userRepository->find($this->getUser());
        $adoptionRequests = $user->getAdoptionRequests();


        return $this->render('adoption_request/index.html.twig', [
            'adoption_requests' => $adoptionRequests
        ]);
    }

    /**
     * @Route("/accept/adoption/{id}", name="accept_adoption")
     */
    public function accept(AdoptionRequest $adoptionRequest, EntityManagerInterface $em): Response
    {
        $adoptionRequest->setIsAccepted(true);
        foreach ($adoptionRequest->getAnnonce()->getDogs() as $dog)
        {
            $dog->setCanBeAdopted(false);
            $em->persist($dog);
        }
        $em->persist($adoptionRequest);
        $em->flush();
        return $this->redirectToRoute("adoption_request");

    }

    /**
     * @Route("/adoption/request/new/{id}", name="new_adoption_request")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param Annonce $annonce
     * @return Response
     */
    public function add(Request $request,EntityManagerInterface $em, Annonce $annonce): Response
    {

        $adoptionRequest = new AdoptionRequest();
        $message = new Message();
        $formMessage = $this->createForm(MessageType::class, $message);
        $formMessage->handleRequest($request);

        if ($formMessage->isSubmitted() && $formMessage->isValid()) {
            $adoptionRequest->setAdoptant($this->getUser());
            $adoptionRequest->setEleveur($annonce->getEleveurSpa());

            $adoptionRequest->setCreatedAt(new \DateTime());
            $adoptionRequest->setIsAccepted(false);
            $adoptionRequest->setAnnonce($annonce);

            $message->setCreatedAt(new \DateTime());
            $message->setAdoptionRequest($adoptionRequest);
            $message->setDestinaire($adoptionRequest->getEleveur());
            $message->setExpediteur($adoptionRequest->getAdoptant());
            $message->setIsRead(false);

            $em->persist($message);
            $adoptionRequest->addMessage($message);

            $em->persist($adoptionRequest);
            $em->flush();

            return $this->redirectToRoute('adoption_request');
        }

        return $this->render('message/create_adoption_request.html.twig', [
            'form_message' => $formMessage->createView()
        ]);
    }

}
