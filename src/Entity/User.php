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
 * @ORM\DiscriminatorMap({"admin" = "Admin", "adoptant" = "Adoptant", "eleveurSpa" = "EleveurSpa"})
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
    protected $username;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
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
     * @ORM\OneToOne(targetEntity=Adresse::class, inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="destinaire", orphanRemoval=true)
     */
    private $messagesRecus;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="expediteur", orphanRemoval=true)
     */
    private $messagesEnvoyes;


    public function __construct()
    {
        $this->sender = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->messagesRecus = new ArrayCollection();
        $this->messagesEnvoyes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }


    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setSender($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getSender() === $this) {
                $message->setSender(null);
            }
        }

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->getUserName();
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessagesRecus(): Collection
    {
        return $this->messagesRecus;
    }

    public function addMessagesRecu(Message $messagesRecu): self
    {
        if (!$this->messagesRecus->contains($messagesRecu)) {
            $this->messagesRecus[] = $messagesRecu;
            $messagesRecu->setDestinaire($this);
        }

        return $this;
    }

    public function removeMessagesRecu(Message $messagesRecu): self
    {
        if ($this->messagesRecus->removeElement($messagesRecu)) {
            // set the owning side to null (unless already changed)
            if ($messagesRecu->getDestinaire() === $this) {
                $messagesRecu->setDestinaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessagesEnvoyes(): Collection
    {
        return $this->messagesEnvoyes;
    }

    public function addMessagesEnvoye(Message $messagesEnvoye): self
    {
        if (!$this->messagesEnvoyes->contains($messagesEnvoye)) {
            $this->messagesEnvoyes[] = $messagesEnvoye;
            $messagesEnvoye->setExpediteur($this);
        }

        return $this;
    }

    public function removeMessagesEnvoye(Message $messagesEnvoye): self
    {
        if ($this->messagesEnvoyes->removeElement($messagesEnvoye)) {
            // set the owning side to null (unless already changed)
            if ($messagesEnvoye->getExpediteur() === $this) {
                $messagesEnvoye->setExpediteur(null);
            }
        }

        return $this;
    }
}
