<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdresseRepository::class)
 */
class Adresse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numberInStreet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOfStreet;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="adresse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="adresse", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberInStreet(): ?string
    {
        return $this->numberInStreet;
    }

    public function setNumberInStreet(string $numberInStreet): self
    {
        $this->numberInStreet = $numberInStreet;

        return $this;
    }

    public function getNameOfStreet(): ?string
    {
        return $this->nameOfStreet;
    }

    public function setNameOfStreet(string $nameOfStreet): self
    {
        $this->nameOfStreet = $nameOfStreet;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getAdresse() !== $this) {
            $user->setAdresse($this);
        }

        $this->user = $user;

        return $this;
    }

    public function __toString()
    {
        return $this->getNumberInStreet().' '. $this->getNameOfStreet();
    }
}
