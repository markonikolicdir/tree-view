<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725081548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tree_entry (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, INDEX IDX_9323BB15727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tree_entry_lang (id INT AUTO_INCREMENT NOT NULL, entry_id INT DEFAULT NULL, lang VARCHAR(3) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_6E380470BA364942 (entry_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tree_entry ADD CONSTRAINT FK_9323BB15727ACA70 FOREIGN KEY (parent_id) REFERENCES tree_entry (id)');
        $this->addSql('ALTER TABLE tree_entry_lang ADD CONSTRAINT FK_6E380470BA364942 FOREIGN KEY (entry_id) REFERENCES tree_entry (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tree_entry DROP FOREIGN KEY FK_9323BB15727ACA70');
        $this->addSql('ALTER TABLE tree_entry_lang DROP FOREIGN KEY FK_6E380470BA364942');
        $this->addSql('DROP TABLE tree_entry');
        $this->addSql('DROP TABLE tree_entry_lang');
    }
}
