<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use DateTime;
use App\Domain\Entity\User;
use App\Domain\Entity\Credentials;
use Doctrine\ORM\EntityRepository;

class CredentialsRepository extends EntityRepository implements CredentialsRepositoryInterface
{
    /**
     * Returns a new Message entity.
     *
     * @param string $username
     * @param string $password
     * @param string $msisdn
     * @param string $bearer
     * 
     * @return Credentials
     */
    public function getNewCredentials(string $username, string $password, string $msisdn, string $bearer, User $user): Credentials
    {
        $credentials = new Credentials();

        $datetime = new DateTime('now');

        $credentials->setUsername($username);
        $credentials->setPassword($password);
        $credentials->setMsisdn($msisdn);
        $credentials->setBearer($bearer);
        $credentials->setUser($user);
        $credentials->setCreated($datetime);
        $credentials->setUpdated($datetime);

        return $credentials;
    }

    /**
     * Persist the given Credentials object.
     *
     * @param Credentials $credentials
     * 
     * @return void
     */
    public function persistCredentials(Credentials $credentials): void
    {
        $this->_em->persist($credentials);

        $this->_em->flush();
    }

    /**
     * Find a set of credentials by its identifier.
     *
     * @param string $identifier
     * 
     * @return Credentials|null
     */
    public function findByIdentifier(string $identifier): ?Credentials
    {
        return $this->findOneBy(['identifier' => $identifier]);
    }

    /**
     * Find a set of credentials by its username.
     *
     * @param string $username
     * 
     * @return Credentials|null
     */
    public function findByUsername(string $username): ?Credentials
    {
        return $this->findOneBy(['username' => $username]);
    }

    /**
     * Removes the given credentials object.
     *
     * @param Credentials $credentials
     * 
     * @return void
     */
    public function removeCredentials(Credentials $credentials): void
    {
        $this->_em->remove($credentials);

        $this->_em->flush();
    }
}