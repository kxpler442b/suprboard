<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;

interface MessageInterface
{
    public function setReference(int $reference): self;

    public function getReference(): int;

    public function setSource(string $source): self;

    public function getSource(): string;

    public function setDestination(string $destination): self;

    public function getDestination(): string;

    public function setBearer(string $bearer): self;

    public function getBearer(): string;

    public function setContent(string $content): self;

    public function getContent(): string;

    public function setReceived(DateTime $received): self;

    public function getReceived(): DateTime;
}