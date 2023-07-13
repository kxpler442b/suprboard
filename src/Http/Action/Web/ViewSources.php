<?php

declare(strict_types = 1);

namespace App\Http\Action\Web;

use GuzzleHttp\Psr7\Response;

class ViewSources extends WebAction
{
    public function action(): Response
    {
        $data = [
            'page' => [
                'zone' => [
                    'name' => 'sources',
                    'Name' => 'Sources'
                ]
            ]
        ];

        return $this->respondWithView('/sources/sources.twig', $data);
    }
}