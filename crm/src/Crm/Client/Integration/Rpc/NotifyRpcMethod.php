<?php
declare(strict_types=1);


namespace App\Crm\Client\Integration\Rpc;

use App\Crm\Client\Domain\Service\NotificatorService;
use App\Crm\Client\Interfaces\ClientReadInterface;
use App\Infrastructure\Rpc\RpcMethodInterface;
use App\Infrastructure\Rpc\RpcRequest;
use App\Infrastructure\Rpc\RpcResponse;

class NotifyRpcMethod implements RpcMethodInterface
{
    /** @var ClientReadInterface */
    private $clientReadInterface;

    /** @var NotificatorService */
    private $notificatorService;

    public function __construct(ClientReadInterface $clientRead, NotificatorService $notificatorService)
    {
        $this->clientRead = $clientRead;
        $this->notificatorService = $notificatorService;
    }

    public function getMethodName(): string
    {
        return 'notify_client';
    }

    public function call(RpcRequest $request): RpcResponse
    {
        $params = $request->getParams();

        $clientId = $params['clientId'] ?? $params[0] ?? null;
        $message = $params['message'] ?? $params[1] ?? null;

        if ($clientId === null) {
            throw new \InvalidArgumentException('`clientId` [0] param must be specified');
        }

        if ($message === null) {
            throw new \InvalidArgumentException('`message` [1] param must be specified');
        }

        $client = $this->clientRead->getClient((int) $clientId);

        if ($client === null) {
            return new RpcResponse('Client not found', 404);
        }

        $this->notificatorService->notifyClient($client, $message);

        return new RpcResponse();
    }
}