<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use App\Http\Action\Action;
use Psr\Log\LoggerInterface;

abstract class AuthAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }
}