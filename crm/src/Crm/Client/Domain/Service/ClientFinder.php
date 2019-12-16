<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Service;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Domain\Repository\ClientRepositoryInterface;
use App\Crm\Client\Interfaces\ClientFinderInterface;
use App\Crm\Client\Interfaces\ClientReadInterface;

class ClientFinder implements ClientReadInterface, ClientFinderInterface
{
    /** @var ClientRepositoryInterface */
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getClient(int $id): ?Client
    {
        return $this->repository->getById($id);
    }

    public function findByEmail(string $email): ?Client
    {
        return $this->repository->findByEmail($email);
    }

    public function findByPhone(string $phone): ?Client
    {
        return $this->repository->findByPhone($phone);
    }
}