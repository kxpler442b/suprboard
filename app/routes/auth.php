<?php

declare(strict_types = 1);

use Slim\Routing\RouteCollectorProxy;
use App\Http\Action\Auth\ViewLoginAction;
use App\Http\Action\Auth\AuthorizeUserAction;

return function(RouteCollectorProxy $auth) {
    $auth->get('', ViewLoginAction::class);
    
    $auth->post('/authorize', AuthorizeUserAction::class);
};