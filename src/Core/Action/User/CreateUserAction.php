<?php

declare(strict_types = 1);

namespace App\Core\Action\User;

use GuzzleHttp\Psr7\Response;
use App\Core\Action\User\UserAction;

class CreateUserAction extends UserAction
{
    protected function action(): Response
    {
        

        return $this->respondWithData();
    }
}