<?php
declare(strict_types=1);


namespace App\Infrastructure\Rpc;


class RpcRequest
{
    /** @var string */
    private $methodName;

    /** @var array|null */
    private $params;

    public function __construct(array $data)
    {
        $this->methodName = $data['method'];
        $this->params = $data['params'] ?? null;
    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function getParams(): array
    {
        return $this->params ?? [];
    }
}