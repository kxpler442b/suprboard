<?php

declare(strict_types = 1);

namespace App\Support\Session;

class Session implements SessionInterface
{
    private readonly array $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function start(): void
    {
        if($this->isActive())
        {
            throw new SessionException('A session is already active.');
        }

        if(headers_sent($file, $line))
        {
            throw new SessionException('Headers have already been sent.');
        }

        session_set_cookie_params([
            'secure' => $this->params['secure'],
            'httponly' => $this->params['httponly'],
            'samesite' => $this->params['samesite']
        ]);

        session_start();
    }

    public function save(): void
    {
        session_write_close();
    }

    public function isActive(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function get(string $key): mixed
    {
        return $_SESSION[$key];
    }

    public function set(string $key, mixed $data): void
    {
        $_SESSION[$key] = $data;
    }

    public function exists(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    public function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_destroy();
    }
}