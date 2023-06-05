<?php

declare(strict_types = 1);

namespace App\Core\Action\User;

use App\Core\Action\Action;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

abstract class UserAction extends Action
{
    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        parent::__construct($c, $logger);
    }
}