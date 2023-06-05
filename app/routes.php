<?php

declare(strict_types = 1);

use Slim\App;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;
use App\Core\Action\Auth\AuthUserAction;
use App\Core\Action\User\ShowUserAction;

return function(App $app)
{
    $app->options('/{routes:.*}', function(Request $request, Response $response) {
        /**
         * CORS Pre-Flight OPTIONS Request Handler
         */

        return $response;
    });

    $app->group('/', function(RouteCollectorProxy $auth) {
        $auth->get('', AuthUserAction::class);
    });

    $app->group('/users', function(RouteCollectorProxy $users) {
        $users->get('/show/{uuid}', ShowUserAction::class);
    });
};