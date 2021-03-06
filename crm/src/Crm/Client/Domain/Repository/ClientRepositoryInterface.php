<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Repository;

use App\Crm\Client\Domain\Model\Client;

interface ClientRepositoryInterface
{
    public function save(Client $client): void;

    public function getById(int $id): ?Client;

    public function findByEmail(string $email): ?Client;

    public function findByPhone(string $phone): ?Client;
}
