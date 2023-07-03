<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;

interface CredentialsInterface
{
    public function setUsername(string $username): self;

    public function getUsername(): string;

    public function setPassword(string $password): self;

    public function getPassword(): string;

    public function setMsisdn(string $msisdn): self;

    public function getMsisdn(): string;

    public function setBearer(string $bearer): self;

    public function getBearer(): string;

    public function setUser(User $user);

    public function getUser(): User;

    public function setCreated(DateTime $created): self;

    public function getCreated(): DateTime;

    public function setUpdated(DateTime $updated): self;

    public function getUpdated(): DateTime;
}