<?php
declare(strict_types=1);

namespace App\Infrastructure\Rpc;

class RpcMethodList
{
    /** @var RpcMethodInterface[] */
    private $methods = [];

    public function __construct(RpcMethodInterface ...$methods)
    {
        foreach ($methods as $method) {
            if (isset($this->methods[$method->getMethodName()])) {
                throw new \InvalidArgumentException("Duplicate RPC method {$method->getMethodName()}");
            }
            $this->methods[$method->getMethodName()] = $method;
        }
    }

    public function findMethod(string $name): ?RpcMethodInterface
    {
        return $this->methods[$name] ?? null;
    }
}