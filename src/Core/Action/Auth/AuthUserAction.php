<?php

declare(strict_types = 1);

namespace App\Core\Action\Auth;

use GuzzleHttp\Psr7\Response;
use App\Core\Action\Auth\AuthAction;

class AuthUserAction extends AuthAction
{
    protected function action(): Response
    {
        $message = 'Hello World!';

        return $this->respondWithView('index.html');
    }
}