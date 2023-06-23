<?php

declare(strict_types = 1);

use Slim\Routing\RouteCollectorProxy;
use App\Core\Action\Dashboard\ViewDashboardAction;

return function(RouteCollectorProxy $dashboard) {
    $dashboard->get('', ViewDashboardAction::class);
};