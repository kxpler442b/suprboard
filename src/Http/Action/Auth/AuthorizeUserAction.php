<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class AuthorizeUserAction extends AuthAction
{
    public function action(): Response
    {
        $this->session->delete('form_data');

        $data = $this->getFormData();

        return $this->respondWithData($data);
    }
}