<?php
declare(strict_types=1);


namespace App\Crm\Client\Domain\Exception;

class ClientException extends \RuntimeException
{
    private const CLIENT_NOT_FOUND = 1;

    public static function createNotFound(): self
    {
        throw new self('Client not found', self::CLIENT_NOT_FOUND);
    }
}