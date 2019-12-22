<?php
declare(strict_types=1);

namespace App\SmsSender\Domain;

use Psr\Log\LoggerInterface;

class SmsSender
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    public function sendSms(string $phoneNumber, string $message): void
    {
        $this->logger->info('Send sms', ['phoneNumber' => $phoneNumber, 'message' => $message]);
    }
}