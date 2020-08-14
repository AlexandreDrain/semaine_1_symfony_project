<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812133317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_article ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire_article ADD CONSTRAINT FK_71F29C357294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_71F29C357294869C ON commentaire_article (article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_article DROP FOREIGN KEY FK_71F29C357294869C');
        $this->addSql('DROP INDEX IDX_71F29C357294869C ON commentaire_article');
        $this->addSql('ALTER TABLE commentaire_article DROP article_id');
    }
}
