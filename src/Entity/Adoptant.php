<?php

namespace App\Entity;

use App\Repository\AdoptantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdoptantRepository::class)
 */
class Adoptant extends User
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=AdoptionRequest::class, mappedBy="adoptant", orphanRemoval=true)
     */
    private $eleveur;

    public function __construct()
    {
        parent::__construct();
        $this->eleveur = new ArrayCollection();
    }



    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|AdoptionRequest[]
     */
    public function getEleveur(): Collection
    {
        return $this->eleveur;
    }

    public function addEleveur(AdoptionRequest $eleveur): self
    {
        if (!$this->eleveur->contains($eleveur)) {
            $this->eleveur[] = $eleveur;
            $eleveur->setAdoptant($this);
        }

        return $this;
    }

    public function removeEleveur(AdoptionRequest $eleveur): self
    {
        if ($this->eleveur->removeElement($eleveur)) {
            // set the owning side to null (unless already changed)
            if ($eleveur->getAdoptant() === $this) {
                $eleveur->setAdoptant(null);
            }
        }

        return $this;
    }

    public function getRoles(): array
    {
        $roles = parent::getRoles();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ADOPTANT';

        return array_unique($roles);
    }

}
