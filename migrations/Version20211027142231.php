<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027142231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_adoptant');
        $this->addSql('DROP TABLE user_adresse');
        $this->addSql('DROP TABLE user_elveurs_spa');
        $this->addSql('ALTER TABLE admin DROP is_admin, DROP password, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE adoptant ADD CONSTRAINT FK_7B42F2ABF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE elveurs_spa CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE elveurs_spa ADD CONSTRAINT FK_CF65374BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD discr VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_adoptant (user_id INT NOT NULL, adoptant_id INT NOT NULL, INDEX IDX_E739CB2AA76ED395 (user_id), INDEX IDX_E739CB2A8D8B49F9 (adoptant_id), PRIMARY KEY(user_id, adoptant_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_adresse (user_id INT NOT NULL, adresse_id INT NOT NULL, INDEX IDX_9B52161CA76ED395 (user_id), INDEX IDX_9B52161C4DE7DC5C (adresse_id), PRIMARY KEY(user_id, adresse_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_elveurs_spa (user_id INT NOT NULL, elveurs_spa_id INT NOT NULL, INDEX IDX_A5ED9AE1A76ED395 (user_id), INDEX IDX_A5ED9AE1F0F15C0E (elveurs_spa_id), PRIMARY KEY(user_id, elveurs_spa_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_adoptant ADD CONSTRAINT FK_E739CB2A8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adoptant ADD CONSTRAINT FK_E739CB2AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adresse ADD CONSTRAINT FK_9B52161C4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_adresse ADD CONSTRAINT FK_9B52161CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_elveurs_spa ADD CONSTRAINT FK_A5ED9AE1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_elveurs_spa ADD CONSTRAINT FK_A5ED9AE1F0F15C0E FOREIGN KEY (elveurs_spa_id) REFERENCES elveurs_spa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE admin ADD is_admin TINYINT(1) NOT NULL, ADD password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE adoptant DROP FOREIGN KEY FK_7B42F2ABF396750');
        $this->addSql('ALTER TABLE adoptant CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE elveurs_spa DROP FOREIGN KEY FK_CF65374BF396750');
        $this->addSql('ALTER TABLE elveurs_spa CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user DROP discr');
    }
}
