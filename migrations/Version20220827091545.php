<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220827091545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_comment_id INT NOT NULL, draw_id INT NOT NULL, comment LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9474526C5F0EBBFF (user_comment_id), INDEX IDX_9474526C6FC5C1B8 (draw_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE draw (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', likes INT DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE draw_category (draw_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_420576376FC5C1B8 (draw_id), INDEX IDX_4205763712469DE2 (category_id), PRIMARY KEY(draw_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_newsletter TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0EBBFF FOREIGN KEY (user_comment_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6FC5C1B8 FOREIGN KEY (draw_id) REFERENCES draw (id)');
        $this->addSql('ALTER TABLE draw_category ADD CONSTRAINT FK_420576376FC5C1B8 FOREIGN KEY (draw_id) REFERENCES draw (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE draw_category ADD CONSTRAINT FK_4205763712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE draw_category DROP FOREIGN KEY FK_4205763712469DE2');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C6FC5C1B8');
        $this->addSql('ALTER TABLE draw_category DROP FOREIGN KEY FK_420576376FC5C1B8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5F0EBBFF');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE draw');
        $this->addSql('DROP TABLE draw_category');
        $this->addSql('DROP TABLE `user`');
    }
}
