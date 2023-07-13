<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class HandleCallback extends AuthAction
{
    public function action(): Response
    {
        $this->auth0->exchange(BASE_URL . '/callback');

        return $this->response->withHeader('Location', BASE_URL . '/web/dashboard')->withStatus(302);
    }
}