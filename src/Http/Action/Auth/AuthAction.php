<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use App\Http\Action\Action;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;
use App\Support\Bouncer\BouncerInterface;

abstract class AuthAction extends Action
{
    protected BouncerInterface $bouncer;

    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        $this->bouncer = $c->get(BouncerInterface::class);
        
        parent::__construct($c, $logger);
    }
}