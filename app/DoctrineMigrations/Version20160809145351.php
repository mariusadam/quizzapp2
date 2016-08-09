<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160809145351 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE questions_answers (question_id INT NOT NULL, answer_id INT NOT NULL, INDEX IDX_2355E6C01E27F6BF (question_id), UNIQUE INDEX UNIQ_2355E6C0AA334807 (answer_id), PRIMARY KEY(question_id, answer_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, rawText VARCHAR(255) NOT NULL, correct TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questions_answers ADD CONSTRAINT FK_2355E6C01E27F6BF FOREIGN KEY (question_id) REFERENCES multiple_choice_question (id)');
        $this->addSql('ALTER TABLE questions_answers ADD CONSTRAINT FK_2355E6C0AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id)');
        $this->addSql('DROP TABLE single_choice_question');
        $this->addSql('ALTER TABLE multiple_choice_question DROP possibleAnswers, DROP correctIndexes');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE questions_answers DROP FOREIGN KEY FK_2355E6C0AA334807');
        $this->addSql('CREATE TABLE single_choice_question (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, raw_text VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, possibleAnswers LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', correctIndex INT NOT NULL, INDEX IDX_7E8BCA5512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE single_choice_question ADD CONSTRAINT FK_7E8BCA5512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE SET NULL');
        $this->addSql('DROP TABLE questions_answers');
        $this->addSql('DROP TABLE answer');
        $this->addSql('ALTER TABLE multiple_choice_question ADD possibleAnswers LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', ADD correctIndexes LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\'');
    }
}
