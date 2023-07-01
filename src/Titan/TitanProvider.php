<?php

declare(strict_types = 1);

namespace App\OAuth;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class TitanProvider extends AbstractProvider
{
    use BearerAuthorizationTrait;
    
    private string $domain = 'https://accounts.xocial.com';
    private string $api = 'https://api.xocial.com';

    public function getBaseAuthorizationUrl()
    {
        return implode('', [$this->domain, '/oauth/authorize']);
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return implode('', [$this->domain, '/oauth/access_token']);
    }

    public function getResourceOwner(AccessToken $token)
    {
        return implode('', [$this->api, '/get/user']);
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return parent::fetchResourceOwnerDetails($token);
    }

    protected function getDefaultScopes()
    {
        
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        
    }
}