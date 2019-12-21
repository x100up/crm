<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="crm", name="client")
 * @ORM\Entity(repositoryClass="App\Crm\Client\Infrastructure\ClientRepository")
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string")
     */
    private $status;

    public function __construct(string $name, string $email, string $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->status = 'active';
    }

    public function update(string $name, string $email, string $phone): void
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function remove(): void
    {
        $this->status = 'deleted';
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
