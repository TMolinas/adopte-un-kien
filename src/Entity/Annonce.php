<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Dog::class, mappedBy="annonce")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dogs;



    public function __construct()
    {
        $this->dog1s = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDog(): ?Dog
    {
        return $this->dog;
    }

    public function setDog(?Dog $dog): self
    {
        $this->dog = $dog;

        return $this;
    }

    /**
     * @return Collection|Dog1[]
     */
    public function getDog1s(): Collection
    {
        return $this->dog1s;
    }

    public function addDog1(Dog1 $dog1): self
    {
        if (!$this->dog1s->contains($dog1)) {
            $this->dog1s[] = $dog1;
            $dog1->setAnnonce($this);
        }

        return $this;
    }

    public function removeDog1(Dog1 $dog1): self
    {
        if ($this->dog1s->removeElement($dog1)) {
            // set the owning side to null (unless already changed)
            if ($dog1->getAnnonce() === $this) {
                $dog1->setAnnonce(null);
            }
        }

        return $this;
    }
}
