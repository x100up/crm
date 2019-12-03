<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Action;

use App\Crm\Users\Domain\Model\User;
use App\Crm\Users\Domain\Repository\UserRepositoryInterface;
use App\Crm\Users\Interfaces\UserRegistrarInterface;

class UserRegistrar implements UserRegistrarInterface
{
    /** @var UserRepositoryInterface */
    private $repository;

    public function createUser(string $email, string $password): void
    {
        $email = mb_strtolower(trim($email));

        $user = new User($email, $password);

        $this->repository->save($user);
    }
}
