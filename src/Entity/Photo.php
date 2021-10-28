<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
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
    private $imgUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOfDog;

    /**
     * @ORM\ManyToOne(targetEntity=Dog::class, inversedBy="photo")
     */
    private $dog;

    public function __construct()
    {
        $this->dogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getNameOfDog(): ?string
    {
        return $this->nameOfDog;
    }

    public function setNameOfDog(string $nameOfDog): self
    {
        $this->nameOfDog = $nameOfDog;

        return $this;
    }

    /**
     * @return Collection|Dog[]
     */
    public function getDogs(): Collection
    {
        return $this->dogs;
    }

    public function addDog(Dog $dog): self
    {
        if (!$this->dogs->contains($dog)) {
            $this->dogs[] = $dog;
            $dog->addPhoto($this);
        }

        return $this;
    }

    public function removeDog(Dog $dog): self
    {
        if ($this->dogs->removeElement($dog)) {
            $dog->removePhoto($this);
        }

        return $this;
    }
}
