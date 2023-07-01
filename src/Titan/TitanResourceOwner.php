<?php

declare(strict_types = 1);

namespace App\OAuth;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class TitanResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;

    private string $domain;

    private array $response;

    /**
     * Creates a new resource owner.
     *
     * @param array $response
     */
    public function __construct(array $response = [])
    {
        $this->response = $response;
    }

    /**
     * Get the resource owner id.
     *
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->getValueByKey($this->response, 'id');
    }

    /**
     * Get the resource owner username.
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->getValueByKey($this->response, 'username');
    }

    /**
     * Get the resource owner email.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getValueByKey($this->response, 'email');
    }

    /**
     * Get the resource owner's given name.
     *
     * @return string|null
     */
    public function getGivenName(): ?string
    {
        return $this->getValueByKey($this->response, 'givenName');
    }

    /**
     * Get the resource owner's family name.
     *
     * @return string|null
     */
    public function getFamilyName(): ?string
    {
        return $this->getValueByKey($this->response, 'familyName');
    }

    /**
     * Get the resource owner's profile url.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->getValueByKey($this->response, 'url');
    }

    /**
     * Set the resource owner's domain.
     *
     * @param string $domain
     * @return self
     */
    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Return the resource owner's details in an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }
}