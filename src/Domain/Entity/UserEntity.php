<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use App\Domain\Trait\EntityUuidTrait;
use App\Domain\Repository\UserRepository;

#[Entity(repositoryClass: UserRepository::class)]
#[Table(name: 'users')]
class UserEntity
{
    use EntityUuidTrait;

    #[Column(type: 'string', length: 320, unique: true)]
    protected string $email;

    #[Column(type: 'string')]
    protected string $password;

    #[Column(type: 'string', length: 64)]
    protected string $firstName;

    #[Column(type: 'string', length: 64, nullable: true)]
    protected string $lastName;

    #[Column(type: 'boolean')]
    protected bool $isAdmin;

    #[Column(type: 'datetime', updatable: false)]
    protected DateTime $created;

    #[Column(type: 'datetime')]    
    protected DateTime $updated;

    /**
     * Get the user's email address.
     *
     * @return string
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the user's email address.
     *
     * @return  self
     */ 
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     * 
     * @return string
     */ 
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return self
     */ 
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the user's first name.
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the user's first name.
     *
     * @return self
     */ 
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the user's last name.
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the user's last name.
     *
     * @return self
     */ 
    public function setLastName(string $lastName = ''): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the user's administrator status.
     *
     * @return bool
     */
    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * Set the user's administrator status.
     *
     * @return  self
     */ 
    public function setIsAdmin(bool $isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the datetime for when the user account was created.
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Set the datetime for when the user account was created.
     * This value cannot be updated.
     *
     * @return  self
     */ 
    public function setCreated()
    {
        $this->created = new DateTime('now');

        return $this;
    }

    /**
     * Get the datetime for when the user account was last updated.
     *
     * @return DateTime
     */ 
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * Set the datetime for when the user account was last updated.
     *
     * @return  self
     */ 
    public function setUpdated()
    {
        $this->updated = new DateTime('now');

        return $this;
    }
}