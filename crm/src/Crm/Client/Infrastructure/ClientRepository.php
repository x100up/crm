<?php
declare(strict_types=1);

namespace App\Crm\Client\Infrastructure;

use App\Crm\Client\Domain\Model\Client;
use App\Crm\Client\Domain\Repository\ClientRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository implements ClientRepositoryInterface
{
    public function save(Client $client): void
    {
        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

    public function getById(int $id): ?Client {
        return $this->findOneBy(['id' => $id, 'status' => 'active']);
    }
}
