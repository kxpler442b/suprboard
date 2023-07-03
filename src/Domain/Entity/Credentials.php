<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use App\Domain\Trait\HasUuidTrait;
use App\Domain\Repository\CredentialsRepository;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity(repositoryClass: CredentialsRepository::class)]
#[Table(name: 'credentials')]
class Credentials implements CredentialsInterface
{
    use HasUuidTrait;

    #[Column(type: 'string', unique: true)]
    private string $username;

    #[Column(type: 'string')]
    private string $password;

    #[Column(type: 'string')]
    private string $msisdn;

    #[Column(type: 'string')]
    private string $country_code;

    #[Column(type: 'string')]
    private string $bearer;

    #[ManyToOne(inversedBy: 'credentials', targetEntity: User::class, cascade: ['persist'])]
    private User $user;

    #[Column(type: 'datetime', updatable: false)]
    private DateTime $created;

    #[Column(type: 'datetime')]
    private DateTime $updated;

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
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

    public function setMsisdn(string $msisdn): self
    {
        $this->msisdn = $msisdn;

        return $this;
    }

    public function getMsisdn(): string
    {
        return $this->msisdn;
    }

    public function setCountryCode(string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    public function setBearer(string $bearer): self
    {
        $this->bearer = $bearer;

        return $this;
    }

    public function getBearer(): string
    {
        return $this->bearer;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
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