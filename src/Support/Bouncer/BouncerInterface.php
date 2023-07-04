<?php

declare(strict_types = 1);

namespace App\Support\Bouncer;

use App\Support\Enum\AuthStatus;

interface BouncerInterface
{
    public function authorize(string $email, string $password): AuthStatus;

    public function verify(): bool;

    public function revoke(): void;

    public function registerNewUser(array $credentials): void;
}