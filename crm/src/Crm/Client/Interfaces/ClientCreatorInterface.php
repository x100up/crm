<?php
declare(strict_types=1);

namespace App\Crm\Client\Interfaces;

interface ClientCreatorInterface
{
    public function createClient(string $name, string $email, string $phone): void;
}