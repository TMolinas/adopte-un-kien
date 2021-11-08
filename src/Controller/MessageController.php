<?php

namespace App\Controller;

use App\Entity\Adoptant;
use App\Entity\AdoptionRequest;
use App\Entity\Message;
use App\Form\MessageType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/messages/{id}", name="messages")
     */
    public function index(Request $request, EntityManagerInterface $em, AdoptionRequest $adoptionRequest): Response
    {
        $messages = $adoptionRequest->getMessages();
        $messagesToRead = new ArrayCollection();
        foreach($messages as $message )
        {
            if($message->getDestinaire()->getUserIdentifier() === $this->getUser()->getUserIdentifier())
            {
                $message->setIsRead(true);
                $messagesToRead->add($message);
                $em->persist($message);
                $em->flush();
            }
            elseif ($message->getExpediteur()->getUserIdentifier() === $this->getUser()->getUserIdentifier())
            {
                $messagesToRead->add($message);
            }
        }


        $message = new Message();
        $formMessage = $this->createForm(MessageType::class, $message);
        $formMessage->handleRequest($request);

        if ($formMessage->isSubmitted() && $formMessage->isValid()) {
            $user = $this->getUser();
            $message->setAdoptionRequest($adoptionRequest);
            if ($user instanceof Adoptant) {
                $message->setDestinaire($adoptionRequest->getEleveur());
            } else {
                $message->setDestinaire($adoptionRequest->getAdoptant());
            }
            $message->setExpediteur($user);
            $message->setCreatedAt(new \DateTime());
            $message->setIsRead(false);

            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('messages', ['id' => $adoptionRequest->getId()]);
        }


        return $this->render('message/index.html.twig', [
            'messages_to_read' => $messagesToRead,
            'form_message' => $formMessage->createView()
        ]);
    }
}
