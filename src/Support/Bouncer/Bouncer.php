<?php

declare(strict_types = 1);

namespace App\Support\Bouncer;

use Ramsey\Uuid\Uuid;
use App\Support\Enum\AuthStatus;
use Odan\Session\SessionInterface;
use App\Domain\Entity\UserInterface;
use Ramsey\Uuid\Rfc4122\UuidInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Repository\UserRepositoryInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class Bouncer implements BouncerInterface
{
    protected SessionInterface $session;
    protected UserRepositoryInterface $users;
    protected EntityManagerInterface $em;
    protected PasswordManagerInterface $passwordManager;

    private ?UserInterface $user = null;
    private ?UuidInterface $authId = null;

    /**
     * Instantiates a new Bouncer instance.
     *
     * @param SessionInterface $session
     * @param UserRepositoryInterface $users
     * @param EntityManagerInterface $em
     */
    public function __construct(SessionInterface $session, UserRepositoryInterface $users, EntityManagerInterface $em, PasswordManagerInterface $passwordManager)
    {
        $this->session = $session;
        $this->users = $users;
        $this->em = $em;
        $this->passwordManager = $passwordManager;
    }

    /**
     * Authorizes a user by validating their password and creating an authenticated session.
     *
     * @param string $email
     * @param string $password
     * 
     * @return AuthStatus
     */
    public function authorize(string $email, string $password): AuthStatus
    {
        $this->user = $this->users->findByEmail($email);

        /**
         * Checks if the user exsits, and if the given password matches the stored password.
         */
        if(!$this->user || !password_verify($password, $this->user->getPassword()))
        {
            return AuthStatus::AUTH_FAILED;
        }

        $this->revoke();

        # Generates a new authorization UUID;
        $this->authId = Uuid::uuid4();

        $authorization = [
            'userIdentifier' => $this->user->getIdentifier()->toString(),
            'userEmail' => $this->user->getEmail()
        ];

        $this->session->set($this->authId->toString(), $authorization);

        return AuthStatus::AUTH_SUCCESS;
    }

    /**
     * Checks if an authenticated session exists and if the stored user exists in the database.
     *
     * @return boolean
     */
    public function verify(): bool
    {
        if(!$this->session->has($this->authId->toString())) {
            return false;
        }

        $authorization = $this->session->has($this->authId->toString());

        $this->user = $this->users->findByIdentifier($authorization['userIdentifier']);

        if(!$this->user) {
            return false;
        }

        return true;
    }

    /**
     * Removes the authorized session.
     *
     * @return void
     */
    public function revoke(): void
    {
        if(!$this->session->has($this->authId->toString())) {
            $this->session->delete($this->authId->toString());
        }
    }

    /**
     * Registers a new user account and stores it in the database.
     *
     * @param array $credentials
     * 
     * @return void
     */
    public function registerNewUser(array $credentials): void
    {
        $hashedPassword = $this->passwordManager->hashPassword($credentials['password']);

        $user = $this->users->getNewUser(
            $credentials['email'],
            $credentials['password'],
            $credentials['given_name'],
            $credentials['family_name'],
            $credentials['is_admin']
        );

        $this->users->persistUser($user);
    }
}