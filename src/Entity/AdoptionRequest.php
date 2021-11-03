<?php

namespace App\Entity;

use App\Repository\AdoptionRequestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdoptionRequestRepository::class)
 */
class AdoptionRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Adoptant::class, inversedBy="adoptionRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adoptant;

    /**
     * @ORM\ManyToOne(targetEntity=ElveursSpa::class, inversedBy="adoptionRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleveur;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="adoptionRequest")
     */
    private $messages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAccepted;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdoptant(): ?Adoptant
    {
        return $this->adoptant;
    }

    public function setAdoptant(?Adoptant $adoptant): self
    {
        $this->adoptant = $adoptant;

        return $this;
    }

    public function getEleveur(): ?ElveursSpa
    {
        return $this->eleveur;
    }

    public function setEleveur(?ElveursSpa $eleveur): self
    {
        $this->eleveur = $eleveur;

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

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setAdoptionRequest($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getAdoptionRequest() === $this) {
                $message->setAdoptionRequest(null);
            }
        }

        return $this;
    }

    public function getIsAccepted(): ?bool
    {
        return $this->isAccepted;
    }

    public function setIsAccepted(bool $isAccepted): self
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }
}
