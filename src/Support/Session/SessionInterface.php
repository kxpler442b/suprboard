<?php

declare(strict_types = 1);

namespace App\Support\Session;

interface SessionInterface
{
    public function start(): void;

    public function save(): void;

    public function isActive(): bool;

    public function get(string $key): mixed;

    public function set(string $key, mixed $data): void;

    public function exists(string $key): bool;

    public function delete(string $key): void;

    public function destroy(): void;
}