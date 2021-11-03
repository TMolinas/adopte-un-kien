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
//    /**
//     * @ORM\Id
//     * @ORM\GeneratedValue
//     * @ORM\Column(type="integer")
//     */
//    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nuberInStreet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOf7Street;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="adresse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="adresse", cascade={"persist", "remove"})
     */
    private $user;

//    public function getId(): ?int
//    {
//        return $this->id;
//    }

    public function getNuberInStreet(): ?string
    {
        return $this->nuberInStreet;
    }

    public function setNuberInStreet(string $nuberInStreet): self
    {
        $this->nuberInStreet = $nuberInStreet;

        return $this;
    }

    public function getNameOf7Street(): ?string
    {
        return $this->nameOf7Street;
    }

    public function setNameOf7Street(string $nameOf7Street): self
    {
        $this->nameOf7Street = $nameOf7Street;

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
}
