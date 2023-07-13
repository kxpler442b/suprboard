<?php

declare(strict_types = 1);

use Slim\App;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use App\Http\Action\Web\ViewSources;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Action\Web\ViewDashboard;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Action\Auth\HandleCallback;
use App\Http\Action\Auth\SignpostClient;
use App\Http\Action\Auth\ClearAuthorization;
use App\Http\Action\Auth\RedirectClientToProvider;

return function(App $app)
{
    $app->options('/{routes:.*}', function(Request $request, Response $response) {
        /**
         * CORS Pre-Flight OPTIONS Request Handler
         */

        return $response;
    });

    $app->group('/', function(RouteCollectorProxy $auth) {
        $auth->get('', SignpostClient::class);
        $auth->get('login', RedirectClientToProvider::class);
        $auth->get('callback', HandleCallback::class);
        $auth->get('logout', ClearAuthorization::class);
    });

    $app->group('/web', function(RouteCollectorProxy $web) {
        $web->get('/dashboard', ViewDashboard::class);
        
        $web->get('/sources', ViewSources::class);
        $web->get('/sources/{sourceId}', ViewSource::class);
        $web->get('/sources/{sourceId}/messages', ViewMessages::class);
    })->add(AuthMiddleware::class);
};