<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Action;

use App\Crm\Users\Domain\Model\User;
use App\Crm\Users\Domain\Repository\UserRepositoryInterface;
use Crm\Users\Interfaces\UserRegistrarInterface;

class UserRegistrar implements UserRegistrarInterface
{
    /** @var UserRepositoryInterface */
    private $repository;

    public function createUser(string $name, string $email): void
    {
        $user = new User($name, $email);

        $this->repository->save($user);
    }
}
