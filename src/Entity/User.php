<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity=adresse::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @ORM\ManyToMany(targetEntity=ElveursSpa::class, inversedBy="users")
     */
    private $EleversSpa;

    /**
     * @ORM\ManyToMany(targetEntity=adresse::class, inversedBy="users")
     */
    private $adress;

    /**
     * @ORM\ManyToMany(targetEntity=Adoptant::class, inversedBy="users")
     */
    private $adoptant;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="user")
     */
    private $annonces;

    public function __construct()
    {
        $this->EleversSpa = new ArrayCollection();
        $this->adress = new ArrayCollection();
        $this->adoptant = new ArrayCollection();
        $this->annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|ElveursSpa[]
     */
    public function getEleversSpa(): Collection
    {
        return $this->EleversSpa;
    }

    public function addEleversSpa(ElveursSpa $eleversSpa): self
    {
        if (!$this->EleversSpa->contains($eleversSpa)) {
            $this->EleversSpa[] = $eleversSpa;
        }

        return $this;
    }

    public function removeEleversSpa(ElveursSpa $eleversSpa): self
    {
        $this->EleversSpa->removeElement($eleversSpa);

        return $this;
    }

    /**
     * @return Collection|adresse[]
     */
    public function getAdress(): Collection
    {
        return $this->adress;
    }

    public function addAdress(adresse $adress): self
    {
        if (!$this->adress->contains($adress)) {
            $this->adress[] = $adress;
        }

        return $this;
    }

    public function removeAdress(adresse $adress): self
    {
        $this->adress->removeElement($adress);

        return $this;
    }

    /**
     * @return Collection|Adoptant[]
     */
    public function getAdoptant(): Collection
    {
        return $this->adoptant;
    }

    public function addAdoptant(Adoptant $adoptant): self
    {
        if (!$this->adoptant->contains($adoptant)) {
            $this->adoptant[] = $adoptant;
        }

        return $this;
    }

    public function removeAdoptant(Adoptant $adoptant): self
    {
        $this->adoptant->removeElement($adoptant);

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
            $annonce->setUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getUser() === $this) {
                $annonce->setUser(null);
            }
        }

        return $this;
    }
}
