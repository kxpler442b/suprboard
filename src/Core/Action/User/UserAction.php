<?php

declare(strict_types = 1);

namespace App\Core\Action\User;

use App\Core\Action\Action;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;
use App\Domain\Repository\UserRepository;

abstract class UserAction extends Action
{
    protected UserRepository $users;

    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        parent::__construct($c, $logger);

        $this->users = $this->em->getRepository('App\Domain\Entity\User');
    }
}