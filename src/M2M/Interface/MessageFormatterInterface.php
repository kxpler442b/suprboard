<?php

declare(strict_types = 1);

namespace App\M2M\Interface;

use JsonSerializable;

interface MessageFormatterInterface
{
    public function asArray(string $message): array;

    public function asJson(string $message): JsonSerializable;
}