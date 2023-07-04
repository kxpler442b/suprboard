<?php

declare(strict_types = 1);

namespace App\Support\Bouncer;

class PasswordManager implements PasswordManagerInterface
{
    private array $options;

    /**
     * Instantiate a new PasswordManager object.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * Hash the given password.
     *
     * @param string $password
     * 
     * @return string
     */
    public function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID, $this->options);
    }

    /**
     * Verify the given password matches the given hash.
     *
     * @param string $password
     * @param string $hash
     * 
     * @return boolean
     */
    public function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}