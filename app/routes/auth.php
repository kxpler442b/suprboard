<?php

declare(strict_types = 1);

use Slim\Routing\RouteCollectorProxy;
use App\Core\Action\Auth\LoginUserAction;
use App\Core\Action\Auth\ViewLoginAction;

return function(RouteCollectorProxy $auth) {
    $auth->get('', AuthRedirectAction::class);
};