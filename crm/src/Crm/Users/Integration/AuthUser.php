<?php
declare(strict_types=1);

namespace App\Crm\Users\Integration;

use App\Crm\Users\Domain\Model\User;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthUser implements UserInterface
{
    /** @var string */
    private $username;
    /** @var string */
    private $password;

    public function __construct(User $user)
    {
        $this->username = $user->getEmail();
        $this->password = $user->getPassword();
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}