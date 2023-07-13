<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class RedirectClientToProvider extends AuthAction
{
    public function action(): Response
    {
        $this->auth0->clear();

        return $this->response->withHeader('Location', $this->auth0->login(BASE_URL . '/callback'))->withStatus(302);
    }
}