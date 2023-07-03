<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use App\Domain\Entity\User;
use Ramsey\Uuid\Rfc4122\UuidInterface;

interface UserRepositoryInterface
{
    public function getNewUser(string $email, string $password, string $given_name, string $family_name, bool $is_admin = false): User;

    public function persistNewUser(User $user): void;

    public function findByIdentifier(string $identifier): ?User;

    public function findByEmail(string $email): ?User;

    public function removeUser(User $user): void;
}