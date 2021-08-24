<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822134510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_vaccin (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, matricule VARCHAR(50) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, date_nais DATE DEFAULT NULL, date_vaccin DATETIME NOT NULL, code_evax VARCHAR(255) NOT NULL, INDEX IDX_EB3BF781F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_vaccin ADD CONSTRAINT FK_EB3BF781F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_vaccin DROP FOREIGN KEY FK_EB3BF781F6BD1646');
        $this->addSql('DROP TABLE agent_vaccin');
        $this->addSql('DROP TABLE site');
    }
}
