<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20191210191956 extends AbstractMigration
{

    public function up(Schema $schema) : void
    {
        $sql = <<<SQL
    CREATE SEQUENCE crm.client_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
    CREATE TABLE crm.client (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id));
SQL;

        $this->connection->exec($sql);

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
