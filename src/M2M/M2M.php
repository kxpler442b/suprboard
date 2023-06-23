<?php

declare(strict_types = 1);

namespace App\M2M;

use App\M2M\SoapClient;
use App\M2M\Interface\M2MInterface;

class M2M implements M2MInterface
{
    protected string $username;
    protected string $password;
    protected string $msisdn;
    protected bool $deliveryReport;
    protected string $mtBearer;
    protected string $countryCode;
    protected $response;
    protected SoapClient $soap;

    public function __construct(SoapClient $soap, array $settings)
    {
        $this->username = $settings['username'];
        $this->password = $settings['password'];
        $this->msisdn = $settings['msisdn'];
        $this->deliveryReport = $settings['deliveryReport'];
        $this->mtBearer = $settings['mtBearer'];
        $this->countryCode = $settings['countryCode'];
        $this->response = null;
        $this->soap = $soap;
    }

    public function getResponse(): mixed
    {
        return $this->response;
    }

    public function sendMessage(string $message)
    {
        
    }

    public function sendMessageWithValidityPeriod(string $message, string $binarySmsDcs = 'F4', string $validityDaysHoursMinutes = '000200')
    {
        
    }

    public function sendBinarySmsMessage(string $message, string $binarySmsDcs = 'F4')
    {
        
    }

    public function waitForMessage(int $timeout = 60, int $msgref = 0)
    {
        
    }

    public function sendAndWait(string $message, int $timeout = 60)
    {
        
    }

    public function sendBinarySmsMessageAndWait(string $message, int $timeout = 60, string $binarySmsDcs = 'F4')
    {
        
    }

    public function readMessages(int $count = 10)
    {
        
    }

    public function peekMessages(int $count = 10)
    {
        $this->response = $this->soap->__soapCall('peekMessages', [
            'username' => $this->username,
            'password' => $this->password,
            'count' => $count,
            'deviceMSISDN' => $this->msisdn
        ]);
    }

    public function flushMessages()
    {
        
    }

    public function getDeliveryReports()
    {
        
    }

    public function getDeliveryReportsFromDate(string $date, string $time)
    {
        
    }
}