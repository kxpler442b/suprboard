<?php

declare(strict_types = 1);

namespace App\Core\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use App\Support\Session\SessionInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SessionMiddleware implements MiddlewareInterface
{
    private SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public static function create(ContainerInterface $c): self
    {
        $session = $c->get(SessionInterface::class);

        return new self($session);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->session->start();

        $response = $handler->handle($request);        

        $this->session->save();

        return $response;
    }
}