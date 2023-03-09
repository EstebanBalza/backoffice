<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228135953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre VARCHAR(50) NOT NULL, contenu VARCHAR(255) NOT NULL, url_photo VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(50) NOT NULL, numero_de_ladresse INT NOT NULL, nom_de_la_voie VARCHAR(255) NOT NULL, prix VARCHAR(50) NOT NULL, date_annonce DATETIME NOT NULL, type VARCHAR(50) NOT NULL, INDEX IDX_45EDC386A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien_form (bien_id INT NOT NULL, form_id INT NOT NULL, INDEX IDX_79C7713DBD95B80F (bien_id), INDEX IDX_79C7713D5FF69B7D (form_id), PRIMARY KEY(bien_id, form_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bien_form ADD CONSTRAINT FK_79C7713DBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bien_form ADD CONSTRAINT FK_79C7713D5FF69B7D FOREIGN KEY (form_id) REFERENCES form (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386A76ED395');
        $this->addSql('ALTER TABLE bien_form DROP FOREIGN KEY FK_79C7713DBD95B80F');
        $this->addSql('ALTER TABLE bien_form DROP FOREIGN KEY FK_79C7713D5FF69B7D');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE bien_form');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
