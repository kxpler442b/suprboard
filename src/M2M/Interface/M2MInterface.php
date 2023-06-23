<?php

declare(strict_types = 1);

namespace App\M2M\Interface;

interface M2MInterface
{
    public function getResponse(): mixed;
    
    public function sendMessage(string $message);
    
    public function sendMessageWithValidityPeriod(string $message, string $binarySmsDcs = 'F4', string $validityDaysHoursMinutes = '000200');

    public function sendBinarySmsMessage(string $message, string $binarySmsDcs = 'F4');

    public function waitForMessage(int $timeout = 60, int $msgref = 0);

    public function sendAndWait(string $message, int $timeout = 60);

    public function sendBinarySmsMessageAndWait(string $message, int $timeout = 60, string $binarySmsDcs = 'F4');

    public function readMessages(int $count = 10);

    public function peekMessages(int $count = 10);

    public function flushMessages();

    public function getDeliveryReports();

    public function getDeliveryReportsFromDate(string $date, string $time);
}