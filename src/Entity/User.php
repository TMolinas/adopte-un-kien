<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"admin" = "Admin"})
 */
abstract class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $userName;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $telephone;

    /**
     * @ORM\Column(type="json")
     */
    protected $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\ManyToOne(targetEntity=adresse::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $adresse;

    /**
     * @ORM\ManyToMany(targetEntity=ElveursSpa::class, inversedBy="users")
     */
    protected $EleversSpa;

    /**
     * @ORM\ManyToMany(targetEntity=adresse::class, inversedBy="users")
     */
    protected $adress;

    /**
     * @ORM\ManyToMany(targetEntity=Adoptant::class, inversedBy="users")
     */
    protected $adoptant;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="user")
     */
    protected $annonces;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
