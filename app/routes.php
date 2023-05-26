<?php

declare(strict_types = 1);

use Slim\App;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

return function(App $app)
{
    $app->options('/{routes:.*}', function(Request $request, Response $response) {
        /**
         * CORS Pre-Flight OPTIONS Request Handler
         */

        return $response;
    });

    $app->get('/', function(Request $request, Response $response) {
        $response->getBody()->write('Hello World!');
        return $response;
    });
};