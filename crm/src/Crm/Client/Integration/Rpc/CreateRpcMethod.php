<?php
declare(strict_types=1);

namespace App\Crm\Client\Integration\Rpc;

use App\Crm\Client\Interfaces\ClientCreatorInterface;
use App\Infrastructure\Rpc\RpcMethodInterface;
use App\Infrastructure\Rpc\RpcRequest;
use App\Infrastructure\Rpc\RpcResponse;

class CreateRpcMethod implements RpcMethodInterface
{
    /** @var ClientCreatorInterface */
    private $clientCreator;

    public function __construct(ClientCreatorInterface $clientCreator)
    {
        $this->clientCreator = $clientCreator;
    }

    public function getMethodName(): string
    {
        return 'create_client';
    }

    public function call(RpcRequest $request): RpcResponse
    {
        $params = $request->getParams();

        $name = $params['name'] ?? $params[0] ?? null;
        $email = $params['email'] ?? $params[1] ?? null;
        $phone = $params['phone'] ?? $params[2] ?? null;


        try {
            $this->clientCreator->createClient($name, $email, $phone);
        } catch (\Throwable $exception) {
            return new RpcResponse('Internal error: '.$exception->getMessage(), 500);
        }

        return new RpcResponse();
    }
}