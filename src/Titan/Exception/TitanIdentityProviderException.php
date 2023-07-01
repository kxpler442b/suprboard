<?php

declare(strict_types = 1);

namespace App\OAuth\Exception;

use Psr\Http\Message\ResponseInterface;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class TitanIdentityProviderException extends IdentityProviderException
{
    /**
     * Creates a client exception from response.
     *
     * @param ResponseInterface $response
     * @param mixed $data
     * @return void
     */
    public static function clientException(ResponseInterface $response, $data)
    {
        return static::fromResponse(
            $response,
            isset($data['message']) ? $data['message'] : $response->getReasonPhrase()
        );
    }

    /**
     * Creates an oauth exception from response.
     *
     * @param ResponseInterface $response
     * @param mixed $data
     * @return void
     */
    public static function oauthException(ResponseInterface $response, $data)
    {
        return static::fromResponse(
            $response,
            isset($data['error']) ? $data['error'] : $response->getReasonPhrase()
        );
    }

    /**
     * Creates an identity exception from response.
     *
     * @param ResponseInterface $response
     * @param mixed $message
     * @return void
     */
    protected static function fromResponse(ResponseInterface $response, $message = null)
    {
        return new static($message, $response->getStatusCode(), (string) $response->getBody());
    }
}