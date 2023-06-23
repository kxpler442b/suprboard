<?php

declare(strict_types = 1);

namespace App\Core\Action\Dashboard;

use GuzzleHttp\Psr7\Response;
use App\Core\Action\Dashboard\DashboardAction;

class ViewDashboardAction extends DashboardAction
{
    protected function action(): Response
    {
        return $this->respondWithView('/dashboard/dashboard.html.twig');
    }
}