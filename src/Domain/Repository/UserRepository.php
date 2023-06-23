<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use App\Domain\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function getNewUser(string $email, string $password, string $given_name, string $family_name, bool $is_admin = false): User
    {
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);
        $user->setGivenName($given_name);
        $user->setFamilyName($family_name);
        $user->setIsAdmin($is_admin);

        return $user;
    }

    public function persistNewUser(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function removeUser(User $user): void
    {
        $this->_em->remove($user);
        $this->_em->flush();
    }
}