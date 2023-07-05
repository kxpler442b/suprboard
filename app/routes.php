<?php

declare(strict_types = 1);

use Slim\App;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Action\Auth\ViewLoginAction;
use App\Http\Action\Auth\AuthorizeUserAction;

return function(App $app)
{
    #$app->options('/{routes:.*}', function(Request $request, Response $response) {
        /**
         * CORS Pre-Flight OPTIONS Request Handler
         */

        #return $response;
    #});

    $app->group('/', function(RouteCollectorProxy $auth) {
        $auth->get('', ViewLoginAction::class);

        $auth->post('authorize', AuthorizeUserAction::class);
    });

    $app->group('/dashboard', require_once __DIR__ . '/routes/dashboard.php');

    $app->group('/users', require_once __DIR__ . '/routes/users.php');
};