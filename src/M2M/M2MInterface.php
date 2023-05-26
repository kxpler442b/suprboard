<?php

declare(strict_types = 1);

namespace App\M2M;

interface M2MInterface
{
    public function sendMessage(): void;
    
    public function getMessages(int $count = 10): array;
}