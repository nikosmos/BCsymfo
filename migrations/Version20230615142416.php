<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615142416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD nom_categorie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE eth ADD cours_eth NUMERIC(10, 6) NOT NULL, ADD jour_cours DATETIME NOT NULL');
        $this->addSql('ALTER TABLE quantite ADD quantite_emise INT NOT NULL, ADD quantite_disponible INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP nom_categorie');
        $this->addSql('ALTER TABLE eth DROP cours_eth, DROP jour_cours');
        $this->addSql('ALTER TABLE quantite DROP quantite_emise, DROP quantite_disponible');
    }
}
