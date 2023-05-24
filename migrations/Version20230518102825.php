<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230518102825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lib_contact (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_contact (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, profil_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_146FF832C54C8C93 (type_id), INDEX IDX_146FF832275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_contact ADD CONSTRAINT FK_146FF832C54C8C93 FOREIGN KEY (type_id) REFERENCES lib_contact (id)');
        $this->addSql('ALTER TABLE user_contact ADD CONSTRAINT FK_146FF832275ED078 FOREIGN KEY (profil_id) REFERENCES user_profil (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_contact DROP FOREIGN KEY FK_146FF832C54C8C93');
        $this->addSql('ALTER TABLE user_contact DROP FOREIGN KEY FK_146FF832275ED078');
        $this->addSql('DROP TABLE lib_contact');
        $this->addSql('DROP TABLE user_contact');
    }
}
