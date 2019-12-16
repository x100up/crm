<?php
declare(strict_types=1);

namespace App\Crm\Users\Integration\Rpc;

use App\Crm\Users\Interfaces\AuthInterface;
use App\Infrastructure\Rpc\RpcMethodInterface;
use App\Infrastructure\Rpc\RpcRequest;
use App\Infrastructure\Rpc\RpcResponse;

class Signin implements RpcMethodInterface
{
    /** @var AuthInterface */
    private $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function getMethodName(): string
    {
        return 'signin';
    }

    public function call(RpcRequest $request): RpcResponse
    {
        $params = $request->getParams();

        $email = $params['email'] ?? $params[0] ?: null;
        $password = $params['password'] ?? $params[1] ?? null;

        try {
            $token = $this->auth->auth($email, $password);
        } catch (\Throwable $exception) {
            return new RpcResponse('Internal error: '.$exception->getMessage(), 500);
        }

        if ($token === null) {
            return new RpcResponse('Unauthorized', 400);
        }

        return new RpcResponse(['token' => $token->getToken()]);
    }
}