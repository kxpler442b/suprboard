<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use App\Domain\Entity\Message;

interface MessageRepositoryInterface
{
    public function getNewMessage(int $reference, string $source, string $destination, string $bearer, string $content, string $receivedtime): Message;

    public function persistMessage(Message $message): void;

    public function findByIdentifier(string $identifier): ?Message;

    public function findByReference(int $reference): ?Message;

    public function removeMessage(Message $message): void;
}