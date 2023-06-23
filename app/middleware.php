<?php

declare(strict_types = 1);

use Slim\App;
use App\Core\Middleware\SessionMiddleware;

return function(App $app)
{
    $c = $app->getContainer();

    $app->add(SessionMiddleware::create($c));
};