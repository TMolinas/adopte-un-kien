<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103154522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adoptant (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adoption_request (id INT AUTO_INCREMENT NOT NULL, adoptant_id INT NOT NULL, eleveur_id INT NOT NULL, annonce_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_accepted TINYINT(1) NOT NULL, INDEX IDX_410896EE8D8B49F9 (adoptant_id), INDEX IDX_410896EE489D1B5F (eleveur_id), INDEX IDX_410896EE8805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, nuber_in_street VARCHAR(10) NOT NULL, name_of7_street VARCHAR(255) NOT NULL, INDEX IDX_C35F0816A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, eleveur_spa_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_F65593E533062D77 (eleveur_spa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, name_of_departement VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, name_of_dog VARCHAR(255) NOT NULL, breed VARCHAR(255) DEFAULT NULL, lof TINYINT(1) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, sociability VARCHAR(255) DEFAULT NULL, can_be_adopted TINYINT(1) NOT NULL, age INT DEFAULT NULL, INDEX IDX_812C397D8805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleveur_spa (id INT NOT NULL, is_spa TINYINT(1) NOT NULL, name_society VARCHAR(255) NOT NULL, siret VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, adoption_request_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FECFD9D75 (adoption_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, dog_id INT DEFAULT NULL, img_url VARCHAR(255) NOT NULL, name_of_dog VARCHAR(255) NOT NULL, INDEX IDX_14B78418634DFEB (dog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, user_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(15) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6494DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, departement_id INT DEFAULT NULL, city_name VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant ADD CONSTRAINT FK_7B42F2ABF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoption_request ADD CONSTRAINT FK_410896EE8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id)');
        $this->addSql('ALTER TABLE adoption_request ADD CONSTRAINT FK_410896EE489D1B5F FOREIGN KEY (eleveur_id) REFERENCES eleveur_spa (id)');
        $this->addSql('ALTER TABLE adoption_request ADD CONSTRAINT FK_410896EE8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E533062D77 FOREIGN KEY (eleveur_spa_id) REFERENCES eleveur_spa (id)');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397D8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE eleveur_spa ADD CONSTRAINT FK_2C349ECEBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FECFD9D75 FOREIGN KEY (adoption_request_id) REFERENCES adoption_request (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoption_request DROP FOREIGN KEY FK_410896EE8D8B49F9');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FECFD9D75');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DE7DC5C');
        $this->addSql('ALTER TABLE adoption_request DROP FOREIGN KEY FK_410896EE8805AB2F');
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397D8805AB2F');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3CCF9E01E');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418634DFEB');
        $this->addSql('ALTER TABLE adoption_request DROP FOREIGN KEY FK_410896EE489D1B5F');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E533062D77');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE adoptant DROP FOREIGN KEY FK_7B42F2ABF396750');
        $this->addSql('ALTER TABLE eleveur_spa DROP FOREIGN KEY FK_2C349ECEBF396750');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A73F0036');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE adoptant');
        $this->addSql('DROP TABLE adoption_request');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE dog');
        $this->addSql('DROP TABLE eleveur_spa');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
