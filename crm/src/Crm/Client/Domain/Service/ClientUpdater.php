<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Service;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Domain\Repository\ClientRepositoryInterface;
use App\Crm\Client\Interfaces\ClientCreatorInterface;
use App\Crm\Client\Interfaces\ClientUpdaterInterface;
use Crm\Client\Domain\Exception\ClientException;

class ClientUpdater implements ClientUpdaterInterface
{
    /** @var ClientRepositoryInterface */
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function updateClient(int $id, string $name, string $email, string $phone): void
    {
        $client = $this->repository->getById($id);

        if ($client === null) {
            throw ClientException::createNotFound();
        }

        $client->update($name, $email, $phone);
        $this->repository->save($client);
    }

    public function removeClient(int $id): void
    {
        $client = $this->repository->getById($id);

        if ($client === null) {
            throw ClientException::createNotFound();
        }

        $client->remove();
        $this->repository->save($client);
    }
}
