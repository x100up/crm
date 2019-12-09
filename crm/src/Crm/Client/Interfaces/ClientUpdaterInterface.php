<?php
declare(strict_types=1);

namespace App\Crm\Client\Interfaces;

interface ClientUpdaterInterface
{
    public function updateClient(int $id, string $name, string $email, string $phone): void;

    public function removeClient(int $id): void;
}