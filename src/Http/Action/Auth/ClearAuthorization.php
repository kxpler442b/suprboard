<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class ClearAuthorization extends AuthAction
{
    public function action(): Response
    {
        return $this->response->withHeader('Location', $this->auth0->logout(BASE_URL))->withStatus(302);
    }
}