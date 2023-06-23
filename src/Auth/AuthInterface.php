<?php

declare(strict_types = 1);

namespace App\Auth;

interface AuthInterface
{
    public function getAuthorization(): array|bool;
    
    public function getBaseUrl(): string;

    public function tryLogInUser(string $email, string $password): bool;

    public function verify(): bool;

    public function logOutUser(string $email): void;
}