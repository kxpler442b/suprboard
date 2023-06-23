<?php

declare(strict_types = 1);

namespace App\Auth;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    private readonly AuthInterface $auth;
    private ResponseFactoryInterface $responseFactory;

    public function __construct(AuthInterface $auth, ResponseFactoryInterface $responseFactory)
    {
        $this->auth = $auth;
        $this->responseFactory = $responseFactory;
    }

    public static function create(ContainerInterface $c, ResponseFactoryInterface $responseFactory)
    {
        return new self($c->get(AuthInterface::class), $responseFactory);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if(!$this->auth->verify())
        {
            return $this->responseFactory->createResponse(302)->withHeader('Location', $this->auth->getBaseUrl());
        }

        return $handler->handle($request);
    }
}