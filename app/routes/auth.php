<?php

declare(strict_types = 1);

use Slim\Routing\RouteCollectorProxy;
use App\Http\Action\Auth\ViewLoginAction;

return function(RouteCollectorProxy $auth) {
    $auth->get('', ViewLoginAction::class);
};