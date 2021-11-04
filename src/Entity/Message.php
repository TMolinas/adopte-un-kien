<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;


    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=AdoptionRequest::class, inversedBy="messages")
     */
    private $adoptionRequest;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messagesRecus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destinaire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messagesEnvoyes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expediteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAdoptionRequest(): ?AdoptionRequest
    {
        return $this->adoptionRequest;
    }

    public function setAdoptionRequest(?AdoptionRequest $adoptionRequest): self
    {
        $this->adoptionRequest = $adoptionRequest;

        return $this;
    }

    public function getDestinaire(): ?User
    {
        return $this->destinaire;
    }

    public function setDestinaire(?User $destinaire): self
    {
        $this->destinaire = $destinaire;

        return $this;
    }

    public function getExpediteur(): ?User
    {
        return $this->expediteur;
    }

    public function setExpediteur(?User $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }
}
