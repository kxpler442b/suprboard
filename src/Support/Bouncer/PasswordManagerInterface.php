<?php

declare(strict_types = 1);

namespace App\Support\Bouncer;

interface PasswordManagerInterface
{
    public function hashPassword(string $password): string;

    public function verifyPassword(string $password, string $hash): bool;
}