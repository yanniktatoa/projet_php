<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727150832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, filiere_id INT NOT NULL, niveau_id INT NOT NULL, libelle VARCHAR(20) NOT NULL, INDEX IDX_8F87BF96180AA129 (filiere_id), INDEX IDX_8F87BF96B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossiers (id INT AUTO_INCREMENT NOT NULL, demande_manuscrite VARCHAR(100) DEFAULT NULL, acte_de_naissance VARCHAR(100) DEFAULT NULL, certificat_de_nationalite VARCHAR(100) DEFAULT NULL, diplome_obtenu VARCHAR(100) DEFAULT NULL, certificat_medical VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, dossier_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenoms VARCHAR(200) NOT NULL, sexe VARCHAR(10) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(100) NOT NULL, nationalite VARCHAR(150) NOT NULL, pays_origine VARCHAR(100) NOT NULL, anne_bac INT NOT NULL, serie_bac VARCHAR(10) NOT NULL, numero_table INT NOT NULL, numero_cni INT DEFAULT NULL, numero_passport INT DEFAULT NULL, numero_telephone INT NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_717E22E3611C0C56 (dossier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tuteur (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, nom VARCHAR(200) NOT NULL, prenoms VARCHAR(200) NOT NULL, profession VARCHAR(200) NOT NULL, nom_employeur VARCHAR(200) NOT NULL, adresse VARCHAR(255) NOT NULL, numero_telephone INT NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_56412268DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3611C0C56 FOREIGN KEY (dossier_id) REFERENCES dossiers (id)');
        $this->addSql('ALTER TABLE tuteur ADD CONSTRAINT FK_56412268DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3611C0C56');
        $this->addSql('ALTER TABLE tuteur DROP FOREIGN KEY FK_56412268DDEAB1A3');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96180AA129');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96B3E9C81');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE dossiers');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE tuteur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
