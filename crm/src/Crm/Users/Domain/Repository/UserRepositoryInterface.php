<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Repository;

use App\Crm\Users\Domain\Model\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;

    public function findByEmail(string $email): ?User;

    public function findById(int $userId): ?User;

    public function findByEmailAndPassword(string $email, string $password): ?User;
}
