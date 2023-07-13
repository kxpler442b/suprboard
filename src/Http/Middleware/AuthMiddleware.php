<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Auth0\SDK\Contract\Auth0Interface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    private Auth0Interface $auth0;

    public function __construct(Auth0Interface $auth0)
    {
        $this->auth0 = $auth0;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $authorization = $this->auth0->getCredentials();

        $response = $handler->handle($request);

        if($authorization == null) {
            return $response->withHeader('Location', BASE_URL . '/login')->withStatus(302);
        } else {
            return $response;
        }
    }
}