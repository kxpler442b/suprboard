<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use DateTime;
use App\Domain\Entity\User;
use App\Domain\Entity\Credentials;
use Doctrine\ORM\EntityRepository;
use App\Domain\Repository\UserRepositoryInterface;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function getNewUser(string $email, string $password, string $given_name, string $family_name, bool $is_admin = false): User
    {
        $user = new User();

        $dt = new DateTime('now');

        $user->setEmail($email);
        $user->setPassword($password);
        $user->setGivenName($given_name);
        $user->setFamilyName($family_name);
        $user->setIsAdmin($is_admin);
        $user->setCreated($dt);
        $user->setUpdated($dt);

        return $user;
    }

    public function persistUser(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function addCredentialsToUser(User $user, Credentials $credentials): void
    {
        $user->getCredentials()->add($credentials);
    }

    public function findByIdentifier(string $identifier): ?User
    {
        return $this->findOneBy(['identifier' => $identifier]);
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