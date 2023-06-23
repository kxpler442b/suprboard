<?php

declare(strict_types = 1);

use Slim\Routing\RouteCollectorProxy;
use App\Core\Action\User\GetUserAction;

return function(RouteCollectorProxy $users) {
    $users->get('/get/{uuid}', GetUserAction::class);
};