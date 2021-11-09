<?php

namespace App\Entity;

use App\Repository\DogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DogRepository::class)
 */
class Dog
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
    private $nameOfDog;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $breed;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lof;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sociability;

    /**
     * @ORM\Column(type="boolean")
     */
    private $canBeAdopted;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="dog")
     */
    private $photos;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="dogs")
     */
    private $annonce;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBreed(): ?string
    {
        return $this->breed;
    }

    public function setBreed(?string $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getLof(): ?bool
    {
        return $this->lof;
    }

    public function setLof(?bool $lof): self
    {
        $this->lof = $lof;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSociability(): ?string
    {
        return $this->sociability;
    }

    public function setSociability(?string $sociability): self
    {
        $this->sociability = $sociability;

        return $this;
    }

    public function getCanBeAdopted(): ?bool
    {
        return $this->canBeAdopted;
    }

    public function setCanBeAdopted(bool $canBeAdopted): self
    {
        $this->canBeAdopted = $canBeAdopted;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setDog($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getDog() === $this) {
                $photo->setDog(null);
            }
        }

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }
}
