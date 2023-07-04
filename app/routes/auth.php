<?php

declare(strict_types = 1);

use Slim\Routing\RouteCollectorProxy;
use App\Http\Action\Auth\ViewLoginAction;
use App\Http\Action\Auth\RegisterUserAction;

return function(RouteCollectorProxy $auth) {
    $auth->get('', ViewLoginAction::class);
    $auth->get('/register', RegisterUserAction::class);
};