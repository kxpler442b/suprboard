<?php

declare(strict_types = 1);

namespace App\Http\Action\Web;

use GuzzleHttp\Psr7\Response;

class ViewDashboard extends WebAction
{
    public function action(): Response
    {
        $data = [
            'page' => [
                'zone' => [
                    'name' => 'dashboard',
                    'Name' => 'Dashboard'
                ],
                'sidebar' => true
            ]
        ];

        return $this->respondWithView('/dashboard/dashboard.twig', $data);
    }
}