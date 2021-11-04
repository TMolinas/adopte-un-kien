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
    private $prenom;


    /**
     * @ORM\OneToMany(targetEntity=AdoptionRequest::class, mappedBy="adoptant1", orphanRemoval=true)
     */
    private $adoptionRequests;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    public function __construct()
    {
        parent::__construct();
        $this->eleveur = new ArrayCollection();
        $this->adoptionRequests = new ArrayCollection();
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


    public function getRoles(): array
    {
        $roles = parent::getRoles();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ADOPTANT';

        return array_unique($roles);
    }

    /**
     * @return Collection|AdoptionRequest[]
     */
    public function getAdoptionRequests(): Collection
    {
        return $this->adoptionRequests;
    }

    public function addAdoptionRequest(AdoptionRequest $adoptionRequest): self
    {
        if (!$this->adoptionRequests->contains($adoptionRequest)) {
            $this->adoptionRequests[] = $adoptionRequest;
            $adoptionRequest->setAdoptant1($this);
        }

        return $this;
    }

    public function removeAdoptionRequest(AdoptionRequest $adoptionRequest): self
    {
        if ($this->adoptionRequests->removeElement($adoptionRequest)) {
            // set the owning side to null (unless already changed)
            if ($adoptionRequest->getAdoptant1() === $this) {
                $adoptionRequest->setAdoptant1(null);
            }
        }

        return $this;
    }

}
