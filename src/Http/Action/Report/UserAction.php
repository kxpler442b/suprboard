<?php

declare(strict_types = 1);

namespace App\Core\Action\Report;

use App\Core\Action\Action;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

abstract class ReportAction extends Action
{
    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        parent::__construct($c, $logger);
    }
}