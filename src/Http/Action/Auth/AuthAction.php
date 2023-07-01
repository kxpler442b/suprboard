<?php

declare(strict_types = 1);

namespace App\Core\Action\Auth;

use App\Auth\AuthInterface;
use App\Core\Action\Action;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

abstract class AuthAction extends Action
{
    protected AuthInterface $auth;

    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        $this->auth = $c->get(AuthInterface::class);
        
        parent::__construct($c, $logger);
    }
}