<?php
declare(strict_types=1);

namespace App\Crm\Users\Infrastructure;

use App\Crm\Users\Domain\Model\AuthToken;
use App\Crm\Users\Domain\Repository\AuthTokenRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class AuthTokenRepository extends EntityRepository implements AuthTokenRepositoryInterface
{
    public function save(AuthToken $authToken): void
    {
        $this->getEntityManager()->persist($authToken);
        $this->getEntityManager()->flush();
    }

    public function getToken(string $token): ?AuthToken
    {
        return $this->findOneBy(['token' => $token]);
    }
}