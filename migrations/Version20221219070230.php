<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221219070230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE informations (id INT AUTO_INCREMENT NOT NULL, pseudo_id INT NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, children VARCHAR(255) NOT NULL, size INT NOT NULL, religion VARCHAR(255) NOT NULL, weight INT NOT NULL, sign VARCHAR(255) NOT NULL, liv VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6F96648920E394C2 (pseudo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, pseudo_id INT DEFAULT NULL, pseudo_exp VARCHAR(255) NOT NULL, pseudo_dest VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DB021E9620E394C2 (pseudo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', pseudo VARCHAR(255) NOT NULL, ip_connexion INT NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE informations ADD CONSTRAINT FK_6F96648920E394C2 FOREIGN KEY (pseudo_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E9620E394C2 FOREIGN KEY (pseudo_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE informations DROP FOREIGN KEY FK_6F96648920E394C2');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E9620E394C2');
        $this->addSql('DROP TABLE informations');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
