<?php
declare(strict_types=1);


namespace App\Crm\Users\Domain\Model;

/**
 * @ORM\Table(schema="crm", name="auth_token")
 * @ORM\Entity(repositoryClass="App\Crm\Users\Infrastructure\AuthTokenRepository")
 */
class AuthToken
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    private $token;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
        $this->token = md5(microtime());
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}