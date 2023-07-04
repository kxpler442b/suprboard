<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;

interface UserInterface
{
    public function setEmail(string $email): self;

    public function getEmail(): string;

    public function setPassword(string $password): self;

    public function getPassword(): string;

    public function setGivenName(string $given_name): self;

    public function getGivenName(): string;

    public function setFamilyName(string $family_name): self;

    public function getFamilyName(): string;

    public function setIsAdmin(bool $is_admin): self;

    public function getIsAdmin(): bool;

    public function getCredentials(): Collection;

    public function setCreated(DateTime $created): self;

    public function getCreated(): DateTime;

    public function setUpdated(DateTime $updated): self;

    public function getUpdated(): DateTime;
}