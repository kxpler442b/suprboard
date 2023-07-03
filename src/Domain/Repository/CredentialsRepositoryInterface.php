<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use App\Domain\Entity\User;
use App\Domain\Entity\Credentials;

interface CredentialsRepositoryInterface
{
    public function getNewCredentials(string $username, string $password, string $msisdn, string $bearer, User $user): Credentials;

    public function persistCredentials(Credentials $credentials): void;

    public function findByIdentifier(string $identifier): ?Credentials;

    public function findByUsername(string $username): ?Credentials;

    public function removeCredentials(Credentials $credentials): void;
}