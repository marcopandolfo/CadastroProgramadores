<?php

declare(strict_types=1);

namespace Zebra\CadastroProgramadores\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200204075316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__programmers AS SELECT id, name, age, city, email, experienceYears, role_id FROM programmers');
        $this->addSql('DROP TABLE programmers');
        $this->addSql('CREATE TABLE programmers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, age INTEGER NOT NULL, city VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, role_id INTEGER DEFAULT NULL, yearsOfExperience DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO programmers (id, name, age, city, email, yearsOfExperience, role_id) SELECT id, name, age, city, email, experienceYears, role_id FROM __temp__programmers');
        $this->addSql('DROP TABLE __temp__programmers');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__programmers AS SELECT id, name, age, city, email, yearsOfExperience, role_id FROM programmers');
        $this->addSql('DROP TABLE programmers');
        $this->addSql('CREATE TABLE programmers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INTEGER NOT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role_id INTEGER DEFAULT NULL, experienceYears DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO programmers (id, name, age, city, email, experienceYears, role_id) SELECT id, name, age, city, email, yearsOfExperience, role_id FROM __temp__programmers');
        $this->addSql('DROP TABLE __temp__programmers');
    }
}
