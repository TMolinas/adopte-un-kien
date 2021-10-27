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
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nuberInStreet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOf7Street;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="Adresse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Adresse")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setAdresse($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAdresse() === $this) {
                $user->setAdresse(null);
            }
        }

        return $this;
    }
}
