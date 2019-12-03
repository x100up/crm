<?php
declare(strict_types=1);

namespace App\Crm\Users\Domain\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="crm", name="users")
 * @ORM\Entity(repositoryClass="App\Crm\Users\Infrastructure\UserRepository")
 */
class User {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")

     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", nullable=true, options={"default":null})
     */
    private $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = md5($password);
    }
}
