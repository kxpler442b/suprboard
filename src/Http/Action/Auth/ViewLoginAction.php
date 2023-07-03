<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class ViewLoginAction extends AuthAction
{
    public function action(): Response
    {
        return $this->respondWithView('/bouncer/bouncer.twig');
    }
}