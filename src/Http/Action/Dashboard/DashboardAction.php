<?php

declare(strict_types = 1);

namespace App\Http\Action\Dashboard;

use App\Http\Action\Action;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

abstract class DashboardAction extends Action
{
    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        parent::__construct($c, $logger);
    }
}