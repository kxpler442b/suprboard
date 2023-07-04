<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use App\Domain\Trait\HasUuidTrait;
use Doctrine\ORM\Mapping\OneToMany;
use App\Domain\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity(repositoryClass: UserRepository::class)]
#[Table(name: 'users')]
class User implements UserInterface
{
    use HasUuidTrait;

    #[Column(type: 'string')]
    private string $email;

    #[Column(type: 'string')]
    private string $password;

    #[Column(type: 'string')]
    private string $given_name;

    #[Column(type: 'string')]
    private string $family_name;

    #[Column(type: 'boolean')]
    private bool $is_admin;

    #[OneToMany(mappedBy: 'user', targetEntity: Credentials::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $credentials;

    #[Column(type: 'datetime', updatable: false)]
    private DateTime $created;

    #[Column(type: 'datetime')]
    private DateTime $updated;

    public function __construct()
    {
        $this->credentials = new ArrayCollection();
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setGivenName(string $given_name): self
    {
        $this->given_name = $given_name;

        return $this;
    }

    public function getGivenName(): string
    {
        return $this->given_name;
    }

    public function setFamilyName(string $family_name): self
    {
        $this->family_name = $family_name;

        return $this;
    }

    public function getFamilyName(): string
    {
        return $this->family_name;
    }

    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    public function getIsAdmin(): bool
    {
        return $this->is_admin;
    }

    public function getCredentials(): Collection
    {
        return $this->credentials;
    }

    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setUpdated(DateTime $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getUpdated(): DateTime
    {
        return $this->updated;
    }
}