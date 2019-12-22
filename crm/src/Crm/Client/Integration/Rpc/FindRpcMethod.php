<?php
declare(strict_types=1);

namespace App\Crm\Client\Integration\Rpc;

use App\Crm\Client\Interfaces\ClientCreatorInterface;
use App\Crm\Client\Interfaces\ClientFinderInterface;
use App\Infrastructure\Rpc\RpcMethodInterface;
use App\Infrastructure\Rpc\RpcRequest;
use App\Infrastructure\Rpc\RpcResponse;

class FindRpcMethod implements RpcMethodInterface
{
    /** @var ClientFinderInterface */
    private $clientFinder;

    public function __construct(ClientFinderInterface $clientFinder)
    {
        $this->clientFinder = $clientFinder;
    }

    public function getMethodName(): string
    {
        return 'find_client';
    }

    public function call(RpcRequest $request): RpcResponse
    {
        $params = $request->getParams();

        $field = $params['field'] ?? $params[0] ?? null;
        $value = $params['value'] ?? $params[1] ?? '';

        if ($field === null) {
            throw new \InvalidArgumentException('`field` [0] param must be specified');
        }

        if ($value === null) {
            throw new \InvalidArgumentException('`value` [1] param must be specified');
        }


        switch ($field) {
            case 'email';
                $client = $this->clientFinder->findByEmail($value);
                break;
            case 'phone';
                $client = $this->clientFinder->findByPhone($value);
                break;
            default:
                throw new \InvalidArgumentException('`field` [0] param must be `email` or `phone`');
        }

       if ($client === null) {
           return new RpcResponse();
       }

        return new RpcResponse([
            'email' => $client->getEmail(),
            'phone' => $client->getPhone(),
            'id' => $client->getId(),
        ]);
    }
}