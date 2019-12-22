<?php
declare(strict_types=1);

namespace App\Crm\Client\Interfaces;

use App\Crm\Client\Domain\Model\Client;

interface ClientCreatorInterface
{
    public function createClient(string $name, string $email, string $phone): Client;
}