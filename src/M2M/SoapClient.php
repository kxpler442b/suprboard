<?php

declare(strict_types = 1);

namespace App\M2M;

use SoapClient as GlobalSoapClient;

class SoapClient extends GlobalSoapClient
{
    protected string $wsdl;
    protected array $clientOptions;

    public function __construct(string $wsdl = '', string $location = '', string $soapVersion = 'SOAP_1_2', bool $trace = true, bool $exceptions = false)
    {
        $this->wsdl = $wsdl;
        $clientOptions = [
            'location' => $location,
            'soap_version' => $soapVersion,
            'trace' => $trace,
            'exceptions' => $exceptions
        ];

        parent::__construct($wsdl, $clientOptions);
    }

    public function getWsdl(): string
    {
        return $this->wsdl;
    }

    public function getClientOptions(): array
    {
        return $this->clientOptions;
    }
}