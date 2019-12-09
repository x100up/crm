<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Action;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Domain\Repository\ClientRepositoryInterface;
use App\Crm\Client\Interfaces\ClientReadInterface;

class ClientFinder implements ClientReadInterface
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
}