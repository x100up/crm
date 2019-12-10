<?php
declare(strict_types=1);

namespace App\Crm\Client\Infrastructure;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Interfaces\ClientNotificatorInterface;
use App\Infrastructure\MailSender\MailSender;

class EmailNotificatorAdapter implements ClientNotificatorInterface
{
    /** @var MailSender */
    private $mailSender;

    public function __construct(MailSender $smsSender)
    {
        $this->mailSender = $smsSender;
    }

    public function notifyClient(Client $client, string $message): void
    {
        $this->mailSender->sendEmail($client->getEmail(), $message);
    }
}