<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Service;

use App\Crm\Users\Domain\Model\User;
use App\Crm\Users\Domain\Repository\AuthTokenRepositoryInterface;
use App\Crm\Users\Domain\Repository\UserRepositoryInterface;
use App\Crm\Users\Interfaces\AuthInterface;
use App\Crm\Users\Domain\Model\AuthToken;

class AuthService implements AuthInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /** @var AuthTokenRepositoryInterface */
    private $authTokenRepository;


    public function __construct(
        UserRepositoryInterface $userRepository,
        AuthTokenRepositoryInterface $authTokenRepository
    ) {
        $this->userRepository = $userRepository;
        $this->authTokenRepository = $authTokenRepository;
    }

    public function auth(string $email, string $password): AuthToken
    {
        $user = $this->userRepository->findByEmailAndPassword($email, $password);

        if ($user !== null) {
            $authToken = new AuthToken($user->getId());
            $this->authTokenRepository->save($authToken);

            return $authToken;
        }

        throw new \RuntimeException('User not found');
    }

    public function authByToken(string $token): ?User
    {
        $authToken = $this->authTokenRepository->getToken($token);

        if ($authToken === null) {
            throw new \RuntimeException();
        }

        return $this->userRepository->findById($authToken->getUserId());
    }
}