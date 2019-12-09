<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Action;

use App\Crm\Users\Domain\Model\User;
use App\Crm\Users\Domain\Repository\UserRepositoryInterface;
use App\Crm\Users\Interfaces\UserRegistrarInterface;
use App\Crm\Users\Domain\Exception\CreateUserException;

class UserRegistrar implements UserRegistrarInterface
{
    /** @var UserRepositoryInterface */
    private $repository;

    public function createUser(string $email, string $password): void
    {
        $email = mb_strtolower(trim($email));

        $user = $this->repository->findByEmail($email);
        if ($user !== null) {
            throw CreateUserException::createAlreadyExists($email);
        }

        $user = new User($email, $password);

        $this->repository->save($user);
    }
}
