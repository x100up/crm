<?php
declare(strict_types=1);

namespace App\Crm\Client\Interfaces;

use App\Crm\Client\Domain\Model\Client;

interface ClientFinderInterface
{
    public function findByEmail(string $email): ?Client;

    public function findByPhone(string $phone): ?Client;
}