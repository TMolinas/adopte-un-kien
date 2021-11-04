<?php

namespace App\Entity;

use App\Repository\LesRefugesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LesRefugesRepository::class)
 */
class Refuge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refugeName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $departementRefuge;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $photoRefuge;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefugeName(): ?string
    {
        return $this->refugeName;
    }

    public function setRefugeName(?string $refugeName): self
    {
        $this->refugeName = $refugeName;

        return $this;
    }

    public function getDepartementRefuge(): ?int
    {
        return $this->departementRefuge;
    }

    public function setDepartementRefuge(?int $departementRefuge): self
    {
        $this->departementRefuge = $departementRefuge;

        return $this;
    }

    public function getPhotoRefuge(): ?string
    {
        return $this->photoRefuge;
    }

    public function setPhotoRefuge(?string $photoRefuge): self
    {
        $this->photoRefuge = $photoRefuge;

        return $this;
    }
}
