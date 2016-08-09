<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160809115527 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE single_choice_question (id INT AUTO_INCREMENT NOT NULL, raw_text VARCHAR(255) NOT NULL, possibleAnswers LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', correctIndex INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE simple_question (id INT AUTO_INCREMENT NOT NULL, raw_text VARCHAR(255) NOT NULL, correctAnswer VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multiple_choice_question (id INT AUTO_INCREMENT NOT NULL, raw_text VARCHAR(255) NOT NULL, possibleAnswers LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', correctIndexes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE single_choice_question');
        $this->addSql('DROP TABLE simple_question');
        $this->addSql('DROP TABLE multiple_choice_question');
    }
}
