<?php

declare(strict_types = 1);

use Slim\App;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;
use App\Core\Action\Auth\AuthUserAction;
use App\Core\Action\Sandbox\PeekMessagesAction;
use App\Core\Action\User\ShowUserAction;

return function(App $app)
{
    $app->options('/{routes:.*}', function(Request $request, Response $response) {
        /**
         * CORS Pre-Flight OPTIONS Request Handler
         */

        return $response;
    });

    $app->group('/', require_once __DIR__ . '/routes/auth.php');

    $app->group('/dashboard', require_once __DIR__ . '/routes/dashboard.php');

    $app->group('/users', require_once __DIR__ . '/routes/users.php');
};