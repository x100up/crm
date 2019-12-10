<?php
declare(strict_types=1);

namespace App\Crm\Client\Interfaces;

use App\Crm\Client\Domain\Model\Client;

interface ClientReadInterface
{
    public function getClient(int $id): ?Client;
}