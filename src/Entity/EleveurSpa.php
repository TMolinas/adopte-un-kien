<?php

namespace App\Entity;

use App\Repository\EleveurSpaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveurSpaRepository::class)
 */
class EleveurSpa extends User
{

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSpa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameSociety;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $siret;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="eleveurSpa")
     * @ORM\JoinColumn(nullable=true)
     */
    private Collection $annonces;

    /**
     * @ORM\OneToMany(targetEntity=AdoptionRequest::class, mappedBy="eleveur", orphanRemoval=true)
     */
    private $adoptionRequests;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->adoptionRequests = new ArrayCollection();
    }


    public function getIsSpa(): bool
    {
        return $this->isSpa;
    }

    public function setIsSpa(bool $isSpa): self
    {
        $this->isSpa = $isSpa;

        return $this;
    }

    public function getNameSociety(): ?string
    {
        return $this->nameSociety;
    }

    public function setNameSociety(string $nameSociety): self
    {
        $this->nameSociety = $nameSociety;

        return $this;
    }

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = parent::getRoles();
        $roles[] = "ROLE_ELEVEUR_SPA";
        return $roles;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonces(Annonce $annonces): self
    {
        if (!$this->annonces->contains($annonces)) {
            $this->annonces[] = $annonces;
            $annonces->setEleveurSpa($this);
        }

        return $this;
    }

    public function removeAnnonces(Annonce $annonces): self
    {
        if ($this->annonces->removeElement($annonces)) {
            // set the owning side to null (unless already changed)
            if ($annonces->getEleveurSpa() === $this) {
                $annonces->setEleveurSpa(null);
            }
        }

        return $this;
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
            $adoptionRequest->setEleveur($this);
        }

        return $this;
    }

    public function removeAdoptionRequest(AdoptionRequest $adoptionRequest): self
    {
        if ($this->adoptionRequests->removeElement($adoptionRequest)) {
            // set the owning side to null (unless already changed)
            if ($adoptionRequest->getEleveur() === $this) {
                $adoptionRequest->setEleveur(null);
            }
        }

        return $this;
    }
}
