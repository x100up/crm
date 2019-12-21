<?php
declare(strict_types=1);

namespace App\Crm\Client\Integration;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Interfaces\ClientNotificatorInterface;
use App\Infrastructure\SmsSender\SmsSender;

class SmsNotificatorAdapter implements ClientNotificatorInterface
{
    /** @var SmsSender */
    private $smsSender;

    public function __construct(SmsSender $smsSender)
    {
        $this->smsSender = $smsSender;
    }

    public function notifyClient(Client $client, string $message): void
    {
        $this->smsSender->sendSms($client->getPhone(), $message);
    }
}