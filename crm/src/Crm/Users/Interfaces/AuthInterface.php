<?php
declare(strict_types=1);

namespace App\Crm\Users\Interfaces;

use App\Crm\Users\Domain\Model\AuthToken;

interface AuthInterface
{
    public function auth(string $name, string $email): ?AuthToken;
}