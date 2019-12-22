<?php
declare(strict_types=1);

namespace App\SmsSender\Integration\Rpc;

use App\Infrastructure\Rpc\RpcMethodInterface;
use App\Infrastructure\Rpc\RpcRequest;
use App\Infrastructure\Rpc\RpcResponse;
use App\SmsSender\Domain\SmsSender;

class SendSms implements RpcMethodInterface
{
    /** @var SmsSender */
    private $smsSender;

    public function __construct(SmsSender $smsSender)
    {
        $this->smsSender = $smsSender;
    }

    public function getMethodName(): string
    {
        return 'send_sms';
    }

    public function call(RpcRequest $request): RpcResponse
    {
        $params = $request->getParams();

        $phoneNumber = $params['phoneNumber'] ?? $params[0] ?: null;
        $message = $params['message'] ?? $params[1] ?? null;

        try {
            $this->smsSender->sendSms((string)$phoneNumber, (string)$message);
        } catch (\Throwable $exception) {
            return new RpcResponse('Internal error: '.$exception->getMessage(), 500);
        }

        return new RpcResponse();
    }
}