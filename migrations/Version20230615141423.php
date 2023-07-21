<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615141423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CA21214B7');
        $this->addSql('DROP INDEX IDX_D9C7463CA21214B7 ON nft');
        $this->addSql('ALTER TABLE nft CHANGE categories_id categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_D9C7463CBCF5E72D ON nft (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CBCF5E72D');
        $this->addSql('DROP INDEX IDX_D9C7463CBCF5E72D ON nft');
        $this->addSql('ALTER TABLE nft CHANGE categorie_id categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CA21214B7 FOREIGN KEY (categories_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_D9C7463CA21214B7 ON nft (categories_id)');
    }
}
