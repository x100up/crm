<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Repository;

use Crm\Users\Domain\Model\AuthToken;

interface AuthTokenRepositoryInterface
{
    public function save(AuthToken $authToken): void;

    public function getToken(string $token): ?AuthToken;
}
