<?php
declare(strict_types=1);

namespace App\Infrastructure\Rpc;


interface RpcMethodInterface
{
    public function getMethodName(): string;

    public function call(RpcRequest $request): RpcResponse;
}