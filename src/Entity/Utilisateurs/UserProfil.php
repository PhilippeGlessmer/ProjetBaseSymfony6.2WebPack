<?php

namespace App\Entity\Utilisateurs;

use App\Repository\Utilisateurs\UserProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserProfilRepository::class)]
class UserProfil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $genre = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(length: 150)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $naissanceAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatar = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $upadatedAt = null;

    #[ORM\OneToOne(inversedBy: 'userProfil', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'profil', targetEntity: UserContact::class)]
    private Collection $userContacts;

    public function __construct()
    {
        $this->userContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNaissanceAt(): ?\DateTimeInterface
    {
        return $this->naissanceAt;
    }

    public function setNaissanceAt(?\DateTimeInterface $naissanceAt): self
    {
        $this->naissanceAt = $naissanceAt;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpadatedAt(): ?\DateTimeImmutable
    {
        return $this->upadatedAt;
    }

    public function setUpadatedAt(?\DateTimeImmutable $upadatedAt): self
    {
        $this->upadatedAt = $upadatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, UserContact>
     */
    public function getUserContacts(): Collection
    {
        return $this->userContacts;
    }

    public function addUserContact(UserContact $userContact): self
    {
        if (!$this->userContacts->contains($userContact)) {
            $this->userContacts->add($userContact);
            $userContact->setProfil($this);
        }

        return $this;
    }

    public function removeUserContact(UserContact $userContact): self
    {
        if ($this->userContacts->removeElement($userContact)) {
            // set the owning side to null (unless already changed)
            if ($userContact->getProfil() === $this) {
                $userContact->setProfil(null);
            }
        }

        return $this;
    }
}
