<?php

namespace App\Entity\Utilisateurs\Lib;

use App\Entity\Utilisateurs\UserContact;
use App\Repository\Utilisateurs\Lib\LibContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibContactRepository::class)]
class LibContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: UserContact::class)]
    private Collection $userContacts;

    public function __construct()
    {
        $this->userContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $userContact->setType($this);
        }

        return $this;
    }

    public function removeUserContact(UserContact $userContact): self
    {
        if ($this->userContacts->removeElement($userContact)) {
            // set the owning side to null (unless already changed)
            if ($userContact->getType() === $this) {
                $userContact->setType(null);
            }
        }

        return $this;
    }
}
