<?php
declare(strict_types=1);

namespace App\Crm\Users\Integration\Rpc;

use App\Crm\Users\Interfaces\UserRegistrarInterface;
use App\Infrastructure\Rpc\RpcMethodInterface;
use App\Infrastructure\Rpc\RpcRequest;
use App\Infrastructure\Rpc\RpcResponse;

class Signup implements RpcMethodInterface
{
    /** @var UserRegistrarInterface */
    private $userRegistrar;

    public function __construct(UserRegistrarInterface $userRegistrar)
    {
        $this->userRegistrar = $userRegistrar;
    }

    public function getMethodName(): string
    {
        return 'signup';
    }

    public function call(RpcRequest $request): RpcResponse
    {
        $params = $request->getParams();

        $name = $params['name'] ?? $params[0] ?: null;
        $email = $params['email'] ?? $params[1] ?: null;
        $password = $params['password'] ?? $params[2] ?: null;

        try {
            $this->userRegistrar->createUser($name, $email, $password);
        } catch (\Throwable $exception) {
            return new RpcResponse('Internal error: '.$exception->getMessage(), 500);
        }

        return new RpcResponse();
    }
}