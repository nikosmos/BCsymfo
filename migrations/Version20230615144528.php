<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615144528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD ligne1 VARCHAR(255) NOT NULL, ADD ligne2 VARCHAR(255) DEFAULT NULL, ADD ligne3 VARCHAR(255) DEFAULT NULL, ADD commune VARCHAR(255) NOT NULL, ADD code_postal VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE genre ADD designation VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP ligne1, DROP ligne2, DROP ligne3, DROP commune, DROP code_postal');
        $this->addSql('ALTER TABLE genre DROP designation');
    }
}
