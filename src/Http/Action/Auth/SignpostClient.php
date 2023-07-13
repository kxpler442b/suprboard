<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class SignpostClient extends AuthAction
{
    public function action(): Response
    {
        $authorization = $this->auth0->getCredentials();

        if($authorization == null) {
            return $this->response->withHeader('Location', BASE_URL . '/login')->withStatus(302);
        } else {
            return $this->response->withHeader('Location', BASE_URL . '/web/dashboard')->withStatus(302);
        }
    }
}