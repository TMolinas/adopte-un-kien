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
    private $nameDog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $breed;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Lof;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sociability;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbDogs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $canBeAdopted;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToMany(targetEntity=photo::class, inversedBy="dogs")
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="dog")
     */
    private $annonces;

    public function __construct()
    {
        $this->photo = new ArrayCollection();
        $this->annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDog(): ?string
    {
        return $this->nameDog;
    }

    public function setNameDog(string $nameDog): self
    {
        $this->nameDog = $nameDog;

        return $this;
    }

    public function getBreed(): ?string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getLof(): ?bool
    {
        return $this->Lof;
    }

    public function setLof(?bool $Lof): self
    {
        $this->Lof = $Lof;

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

    public function setSociability(string $sociability): self
    {
        $this->sociability = $sociability;

        return $this;
    }

    public function getNbDogs(): ?int
    {
        return $this->nbDogs;
    }

    public function setNbDogs(int $nbDogs): self
    {
        $this->nbDogs = $nbDogs;

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

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|photo[]
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(photo $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
        }

        return $this;
    }

    public function removePhoto(photo $photo): self
    {
        $this->photo->removeElement($photo);

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setDog($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getDog() === $this) {
                $annonce->setDog(null);
            }
        }

        return $this;
    }
}
