<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812132258 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_produit ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire_produit ADD CONSTRAINT FK_5A6D7E744584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_5A6D7E744584665A ON commentaire_produit (product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_produit DROP FOREIGN KEY FK_5A6D7E744584665A');
        $this->addSql('DROP INDEX IDX_5A6D7E744584665A ON commentaire_produit');
        $this->addSql('ALTER TABLE commentaire_produit DROP product_id');
    }
}
