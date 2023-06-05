<?php

declare(strict_types = 1);

namespace App\Core\Action\User;

use GuzzleHttp\Psr7\Response;
use App\Core\Action\User\UserAction;

class ShowUserAction extends UserAction
{
    protected function action(): Response
    {
        $message = 'Hello World!';

        return $this->respondWithView('index.html');
    }
}