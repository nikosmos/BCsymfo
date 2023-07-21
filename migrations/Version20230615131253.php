<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615131253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft ADD categories_id INT NOT NULL, ADD quantite_id INT NOT NULL, ADD transaction_historique_id INT DEFAULT NULL, ADD eth_id INT NOT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CA21214B7 FOREIGN KEY (categories_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C6444A2DB FOREIGN KEY (quantite_id) REFERENCES quantite (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C2CDF71D3 FOREIGN KEY (transaction_historique_id) REFERENCES transaction_historique (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C823BBA8B FOREIGN KEY (eth_id) REFERENCES eth (id)');
        $this->addSql('CREATE INDEX IDX_D9C7463CA21214B7 ON nft (categories_id)');
        $this->addSql('CREATE INDEX IDX_D9C7463C6444A2DB ON nft (quantite_id)');
        $this->addSql('CREATE INDEX IDX_D9C7463C2CDF71D3 ON nft (transaction_historique_id)');
        $this->addSql('CREATE INDEX IDX_D9C7463C823BBA8B ON nft (eth_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CA21214B7');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C6444A2DB');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C2CDF71D3');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C823BBA8B');
        $this->addSql('DROP INDEX IDX_D9C7463CA21214B7 ON nft');
        $this->addSql('DROP INDEX IDX_D9C7463C6444A2DB ON nft');
        $this->addSql('DROP INDEX IDX_D9C7463C2CDF71D3 ON nft');
        $this->addSql('DROP INDEX IDX_D9C7463C823BBA8B ON nft');
        $this->addSql('ALTER TABLE nft DROP categories_id, DROP quantite_id, DROP transaction_historique_id, DROP eth_id');
    }
}
