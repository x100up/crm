<?php
declare(strict_types=1);

namespace App\Crm\Users\Infrastructure;

use App\Crm\Users\Domain\Model\User;
use App\Crm\Users\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function save(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function findByEmailAndPassword(string $email, string $password): ?User
    {
        return $this->findOneBy(['email' => $email, 'password' => $password]);
    }

    public function findById(int $userId): ?User
    {
        return $this->find($userId);
    }
}
