<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Service;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Interfaces\ClientNotificatorInterface;

class NotificatorService
{
    /** @var ClientNotificatorInterface[] */
    private $notificatorList;

    public function __construct(ClientNotificatorInterface ...$notificatorList)
    {
        $this->notificatorList = $notificatorList;
    }

    public function notifyClient(Client $client, string $message): void
    {
        foreach ($this->notificatorList as $notificator) {
            $notificator->notifyClient($client, $message);
        }
    }
}