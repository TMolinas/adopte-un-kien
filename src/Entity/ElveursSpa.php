<?php

namespace App\Entity;

use App\Repository\ElveursSpaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ElveursSpaRepository::class)
 */
class ElveursSpa extends User
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
     * @ORM\Column(type="integer")
     */
    private $siret;

    public function __construct()
    {
    }


    public function getIsSpa(): ?bool
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
        $roles[] = "ROLE_ELVEUR_SPA";
        return $roles;
    }
}
