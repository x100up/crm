<?php
declare(strict_types=1);

namespace App\Infrastructure\Rpc;

class RpcResponse implements \JsonSerializable
{
    /** @var mixed */
    private $result;
    /** @var int */
    private $code;

    public function __construct($data = null, int $code = 200)
    {
        $this->result = $data;
        $this->code = $code;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function jsonSerialize(): array
    {
        $data = ['jsonrpc' => '2.0'];

        if ($this->result !== null) {
            $data['result'] = $this->result;
        } else {
            $data['result'] = 'success';
        }

        return $data;
    }
}