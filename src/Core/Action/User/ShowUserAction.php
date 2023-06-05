<?php

declare(strict_types = 1);

namespace App\Core\Action\User;

use GuzzleHttp\Psr7\Response;
use App\Core\Action\User\UserAction;
use Doctrine\ORM\Exception\RepositoryException;

class ShowUserAction extends UserAction
{
    protected function action(): Response
    {
        try {
            // $user = $this->users->findByUuid($this->args['uuid']);
        } catch(RepositoryException $e) {

        }

        return $this->respondWithData(null, 501);
    }
}