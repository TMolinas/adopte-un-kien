<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026142716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, is_admin TINYINT(1) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adoptant (id INT AUTO_INCREMENT NOT NULL, non VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, nuber_in_street VARCHAR(10) NOT NULL, name_of7_street VARCHAR(255) NOT NULL, INDEX IDX_C35F0816A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, dog_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_F65593E5A76ED395 (user_id), INDEX IDX_F65593E5634DFEB (dog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, name_of_departement VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog (id INT AUTO_INCREMENT NOT NULL, name_dog VARCHAR(255) NOT NULL, breed VARCHAR(255) NOT NULL, lof TINYINT(1) DEFAULT NULL, description VARCHAR(400) DEFAULT NULL, sociability VARCHAR(255) NOT NULL, nb_dogs INT NOT NULL, can_be_adopted TINYINT(1) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog_photo (dog_id INT NOT NULL, photo_id INT NOT NULL, INDEX IDX_8F11CD5D634DFEB (dog_id), INDEX IDX_8F11CD5D7E9E4C8C (photo_id), PRIMARY KEY(dog_id, photo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elveurs_spa (id INT AUTO_INCREMENT NOT NULL, is_spa TINYINT(1) NOT NULL, name_society VARCHAR(255) NOT NULL, siret INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, img_url VARCHAR(255) NOT NULL, name_of_dog VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, user_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(15) NOT NULL, INDEX IDX_8D93D6494DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_elveurs_spa (user_id INT NOT NULL, elveurs_spa_id INT NOT NULL, INDEX IDX_A5ED9AE1A76ED395 (user_id), INDEX IDX_A5ED9AE1F0F15C0E (elveurs_spa_id), PRIMARY KEY(user_id, elveurs_spa_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_adresse (user_id INT NOT NULL, adresse_id INT NOT NULL, INDEX IDX_9B52161CA76ED395 (user_id), INDEX IDX_9B52161C4DE7DC5C (adresse_id), PRIMARY KEY(user_id, adresse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_adoptant (user_id INT NOT NULL, adoptant_id INT NOT NULL, INDEX IDX_E739CB2AA76ED395 (user_id), INDEX IDX_E739CB2A8D8B49F9 (adoptant_id), PRIMARY KEY(user_id, adoptant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, departement_id INT DEFAULT NULL, city_name VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('ALTER TABLE dog_photo ADD CONSTRAINT FK_8F11CD5D634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog_photo ADD CONSTRAINT FK_8F11CD5D7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE user_elveurs_spa ADD CONSTRAINT FK_A5ED9AE1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_elveurs_spa ADD CONSTRAINT FK_A5ED9AE1F0F15C0E FOREIGN KEY (elveurs_spa_id) REFERENCES elveurs_spa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adresse ADD CONSTRAINT FK_9B52161CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adresse ADD CONSTRAINT FK_9B52161C4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adoptant ADD CONSTRAINT FK_E739CB2AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adoptant ADD CONSTRAINT FK_E739CB2A8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_adoptant DROP FOREIGN KEY FK_E739CB2A8D8B49F9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DE7DC5C');
        $this->addSql('ALTER TABLE user_adresse DROP FOREIGN KEY FK_9B52161C4DE7DC5C');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3CCF9E01E');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5634DFEB');
        $this->addSql('ALTER TABLE dog_photo DROP FOREIGN KEY FK_8F11CD5D634DFEB');
        $this->addSql('ALTER TABLE user_elveurs_spa DROP FOREIGN KEY FK_A5ED9AE1F0F15C0E');
        $this->addSql('ALTER TABLE dog_photo DROP FOREIGN KEY FK_8F11CD5D7E9E4C8C');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('ALTER TABLE user_elveurs_spa DROP FOREIGN KEY FK_A5ED9AE1A76ED395');
        $this->addSql('ALTER TABLE user_adresse DROP FOREIGN KEY FK_9B52161CA76ED395');
        $this->addSql('ALTER TABLE user_adoptant DROP FOREIGN KEY FK_E739CB2AA76ED395');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A73F0036');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE adoptant');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE dog');
        $this->addSql('DROP TABLE dog_photo');
        $this->addSql('DROP TABLE elveurs_spa');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_elveurs_spa');
        $this->addSql('DROP TABLE user_adresse');
        $this->addSql('DROP TABLE user_adoptant');
        $this->addSql('DROP TABLE ville');
    }
}
