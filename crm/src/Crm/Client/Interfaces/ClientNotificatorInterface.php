<?php
declare(strict_types=1);

namespace App\Crm\Client\Interfaces;

use App\Crm\Client\Domain\Model\Client;

interface ClientNotificatorInterface
{
    public function notifyClient(Client $client, string $message): void;
}