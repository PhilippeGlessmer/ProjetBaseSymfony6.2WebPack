<?php

namespace App\Entity\Utilisateurs;

use App\Entity\Utilisateurs\Lib\LibContact;
use App\Repository\Utilisateurs\UserContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserContactRepository::class)]
class UserContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'userContacts')]
    private ?LibContact $type = null;

    #[ORM\ManyToOne(inversedBy: 'userContacts')]
    private ?UserProfil $profil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getType(): ?LibContact
    {
        return $this->type;
    }

    public function setType(?LibContact $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProfil(): ?UserProfil
    {
        return $this->profil;
    }

    public function setProfil(?UserProfil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }
}
