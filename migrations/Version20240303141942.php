<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303141942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ajouter (id INT AUTO_INCREMENT NOT NULL, employer_id INT DEFAULT NULL, societe_id INT DEFAULT NULL, jours_travailler VARCHAR(100) NOT NULL, date_entree_employer DATE NOT NULL, date_sortie_employer DATE DEFAULT NULL, date_jours_vacances DATE DEFAULT NULL, date_fin_vacances DATE DEFAULT NULL, debut_repas TIME DEFAULT NULL, fin_repas TIME DEFAULT NULL, INDEX IDX_AB384B5F41CD9E7A (employer_id), INDEX IDX_AB384B5FFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, race_id INT DEFAULT NULL, patient_id INT DEFAULT NULL, prenom_animal VARCHAR(50) NOT NULL, date_naissance_animal DATE NOT NULL, date_creation_animal DATE DEFAULT NULL, date_fin_animal DATE DEFAULT NULL, images_animal VARCHAR(255) DEFAULT NULL, INDEX IDX_6AAB231F6E59D40D (race_id), INDEX IDX_6AAB231F6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, nom_commune VARCHAR(100) NOT NULL, code_postal_commune VARCHAR(5) NOT NULL, latitude VARCHAR(50) NOT NULL, longitude VARCHAR(50) NOT NULL, nom_departement VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_employer VARCHAR(50) NOT NULL, prenom_employer VARCHAR(50) NOT NULL, adresse_employer VARCHAR(255) NOT NULL, complement_adresse_employer VARCHAR(255) DEFAULT NULL, code_postal_employer VARCHAR(5) NOT NULL, ville_employer VARCHAR(50) NOT NULL, telephone_employer VARCHAR(10) NOT NULL, profession_employer VARCHAR(20) NOT NULL, images_employer VARCHAR(255) DEFAULT NULL, date_creation_employer DATE NOT NULL, UNIQUE INDEX UNIQ_DE4CF066E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, prenom_patient VARCHAR(50) NOT NULL, adresse_patient VARCHAR(255) NOT NULL, complement_adresse_patient VARCHAR(255) DEFAULT NULL, code_postal_patient VARCHAR(5) NOT NULL, ville_patient VARCHAR(50) NOT NULL, telephone_patient VARCHAR(10) NOT NULL, date_creation_patient DATE NOT NULL, date_fin_patient DATE DEFAULT NULL, UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, race_animal VARCHAR(30) NOT NULL, INDEX IDX_DA6FBBAFC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, animal_id INT DEFAULT NULL, employer_id INT DEFAULT NULL, societe_id INT DEFAULT NULL, date_rdv DATE NOT NULL, heure TIME NOT NULL, status_rdv VARCHAR(20) DEFAULT NULL, INDEX IDX_10C31F866B899279 (patient_id), INDEX IDX_10C31F868E962C16 (animal_id), INDEX IDX_10C31F8641CD9E7A (employer_id), INDEX IDX_10C31F86FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, siret VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_societe VARCHAR(50) NOT NULL, profession_societe VARCHAR(20) NOT NULL, nom_dirigeant VARCHAR(50) NOT NULL, adresse_societe VARCHAR(255) NOT NULL, complement_adresse_societe VARCHAR(255) DEFAULT NULL, code_postal_societe VARCHAR(5) NOT NULL, ville_societe VARCHAR(50) NOT NULL, telephone_societe VARCHAR(10) NOT NULL, telephone_dirigeant VARCHAR(10) NOT NULL, email VARCHAR(100) NOT NULL, images VARCHAR(255) DEFAULT NULL, date_creation_societe DATE NOT NULL, date_resiliation_societe DATE DEFAULT NULL, date_validation_societe DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_19653DBD26E94372 (siret), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soigner (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, patient_id INT DEFAULT NULL, employer_id INT DEFAULT NULL, societe_id INT DEFAULT NULL, acte_soins VARCHAR(255) DEFAULT NULL, traitement VARCHAR(100) DEFAULT NULL, nombre_fois BIGINT DEFAULT NULL, date_soins DATE DEFAULT NULL, INDEX IDX_6F551B198E962C16 (animal_id), INDEX IDX_6F551B196B899279 (patient_id), INDEX IDX_6F551B1941CD9E7A (employer_id), INDEX IDX_6F551B19FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type_animal VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5F41CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5FFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F868E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8641CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B198E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B196B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B1941CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B19FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5F41CD9E7A');
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5FFCF77503');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F6E59D40D');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F6B899279');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAFC54C8C93');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F866B899279');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F868E962C16');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8641CD9E7A');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86FCF77503');
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B198E962C16');
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B196B899279');
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B1941CD9E7A');
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B19FCF77503');
        $this->addSql('DROP TABLE ajouter');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE soigner');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
