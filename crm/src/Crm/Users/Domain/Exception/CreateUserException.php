<?php
declare(strict_types=1);


namespace App\Crm\Users\Domain\Exception;

class CreateUserException extends \RuntimeException
{
    private const USER_ALREADY_EXISTS = 1;

    public static function createAlreadyExists(string $email): self
    {
        throw new self("User with email {$email} already exists", self::USER_ALREADY_EXISTS);
    }
}