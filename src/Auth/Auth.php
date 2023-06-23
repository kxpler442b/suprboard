<?php

declare(strict_types = 1);

namespace App\Auth;

use DateTime;
use App\Domain\Entity\User;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Support\Session\SessionInterface;
use App\Domain\Repository\UserRepositoryInterface;

class Auth implements AuthInterface
{
    private readonly UserRepositoryInterface $users;
    private SessionInterface $session;
    private LoggerInterface $logger;
    private string $base_url;

    public function __construct(EntityManagerInterface $em, SessionInterface $session, LoggerInterface $logger, string $base_url)
    {
        $this->users = $em->getRepository(User::class);
        $this->session = $session;
        $this->logger = $logger;
        $this->base_url = $base_url;
    }

    public function getBaseUrl(): string
    {
        return $this->base_url;
    }

    public function getAuthorization(): array|bool
    {
        if(!$this->session->exists('authorization'))
        {
            return false;
        }

        else return $this->session->get('authorization');
    }

    public function tryLogInUser(string $email, string $password): bool
    {
        $user = $this->users->findByEmail($email);

        if(!$user || !password_verify($password, $user->getPassword())) 
        {
            return false;
        }

        $this->session->set('authorization', [
            'uuid' => $user->getUuid(),
            'email' => $user->getEmail()
        ]);

        $this->logger->info(implode(' ', ['User', $user->getEmail(), 'authenticated at', new DateTime('now')]));

        return true;
    }

    public function verify(): bool
    {
        $authorization = $this->getAuthorization();

        if(!$authorization) 
        {
            return false;
        }

        $user = $this->users->findByEmail($authorization['email']);

        if(!$user)
        {
            return false;
        }

        return true;
    }

    public function logOutUser(string $email): void
    {
        $this->session->destroy();
    }
}