<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160809133311 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, member_since DATETIME NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_64C19C15E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE single_choice_question ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE single_choice_question ADD CONSTRAINT FK_7E8BCA5512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_7E8BCA5512469DE2 ON single_choice_question (category_id)');
        $this->addSql('ALTER TABLE simple_question ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE simple_question ADD CONSTRAINT FK_9CD22BC412469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_9CD22BC412469DE2 ON simple_question (category_id)');
        $this->addSql('ALTER TABLE multiple_choice_question ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE multiple_choice_question ADD CONSTRAINT FK_2455725312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_2455725312469DE2 ON multiple_choice_question (category_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE single_choice_question DROP FOREIGN KEY FK_7E8BCA5512469DE2');
        $this->addSql('ALTER TABLE simple_question DROP FOREIGN KEY FK_9CD22BC412469DE2');
        $this->addSql('ALTER TABLE multiple_choice_question DROP FOREIGN KEY FK_2455725312469DE2');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_2455725312469DE2 ON multiple_choice_question');
        $this->addSql('ALTER TABLE multiple_choice_question DROP category_id');
        $this->addSql('DROP INDEX IDX_9CD22BC412469DE2 ON simple_question');
        $this->addSql('ALTER TABLE simple_question DROP category_id');
        $this->addSql('DROP INDEX IDX_7E8BCA5512469DE2 ON single_choice_question');
        $this->addSql('ALTER TABLE single_choice_question DROP category_id');
    }
}
