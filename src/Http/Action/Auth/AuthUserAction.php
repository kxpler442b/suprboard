<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;
use App\Http\Action\Auth\AuthAction;

class AuthUserAction extends AuthAction
{
    protected function action(): Response
    {
        $message = 'Hello World!';

        return $this->respondWithData($message);
    }
}