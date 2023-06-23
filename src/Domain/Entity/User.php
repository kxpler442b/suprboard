<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use App\Domain\Trait\HasUuidTrait;
use App\Domain\Repository\UserRepository;

#[Entity(repositoryClass: UserRepository::class)]
#[Table(name: 'users')]
class User
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

    #[Column(type: 'datetime_immutable', updatable: false)]
    private DateTimeImmutable $created;

    #[Column(type: 'datetime')]
    private DateTime $updated;

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setGivenName(string $given_name): void
    {
        $this->given_name = $given_name;
    }

    public function getGivenName(): string
    {
        return $this->given_name;
    }

    public function setFamilyName(string $family_name): void
    {
        $this->family_name = $family_name;
    }

    public function getFamilyName(): string
    {
        return $this->family_name;
    }

    public function setIsAdmin(bool $is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    public function getIsAdmin(): bool
    {
        return $this->is_admin;
    }

    public function setCreated(DateTimeImmutable $created): void
    {
        $this->created = $created;
    }

    public function getCreated(): DateTimeImmutable
    {
        return $this->created;
    }

    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }

    public function getUpdated(): DateTime
    {
        return $this->updated;
    }
}