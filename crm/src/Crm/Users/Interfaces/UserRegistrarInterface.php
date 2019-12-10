<?php
declare(strict_types=1);

namespace App\Crm\Users\Interfaces;

interface UserRegistrarInterface
{
    public function createUser(string $name, string $email): void;
}