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
    private $non;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;



    public function getNon(): ?string
    {
        return $this->non;
    }

    public function setNon(string $non): self
    {
        $this->non = $non;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
}
