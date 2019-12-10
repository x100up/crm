<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20191210191955 extends AbstractMigration
{

    public function up(Schema $schema) : void
    {
        $sql = <<<SQL
     CREATE SCHEMA crm;
     CREATE SEQUENCE crm.auth_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
     CREATE SEQUENCE crm.users_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
     CREATE TABLE crm.auth_token (id INT NOT NULL, user_id INT NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id));
     CREATE TABLE crm.users (id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id));
SQL;

        $this->connection->exec($sql);

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
