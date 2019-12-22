<?php
declare(strict_types=1);

namespace App\Crm\Client\Domain\Service;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Domain\Repository\ClientRepositoryInterface;
use App\Crm\Client\Interfaces\ClientCreatorInterface;

class ClientCreator implements ClientCreatorInterface
{
    /** @var ClientRepositoryInterface */
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createClient(string $name, string $email, string $phone): Client
    {
        $client = new Client($name, $email, $phone);

        $this->repository->save($client);

        return $client;
    }
}
