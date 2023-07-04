<?php

declare(strict_types = 1);

namespace App\Http\Action\Auth;

use GuzzleHttp\Psr7\Response;

class ViewLoginAction extends AuthAction
{
    public function action(): Response
    {
        $data = [
            'page' => [
                'title' => 'Sign in - Suprboard'
            ]
        ];
        
        return $this->respondWithView('/auth/auth.twig', $data);
    }
}