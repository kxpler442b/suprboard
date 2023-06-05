<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use Ramsey\Uuid\UuidInterface;
use App\Domain\Entity\UserEntity;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findByUuid(UuidInterface|string $uuid): UserEntity
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }
}