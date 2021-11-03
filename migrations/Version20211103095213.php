<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103095213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E533062D77');
        $this->addSql('CREATE TABLE eleveur_spa (id INT NOT NULL, is_spa TINYINT(1) NOT NULL, name_society VARCHAR(255) NOT NULL, siret VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eleveur_spa ADD CONSTRAINT FK_2C349ECEBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE elveurs_spa');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E533062D77 FOREIGN KEY (eleveur_spa_id) REFERENCES eleveur_spa (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E533062D77');
        $this->addSql('CREATE TABLE elveurs_spa (id INT NOT NULL, is_spa TINYINT(1) NOT NULL, name_society VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, siret VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE elveurs_spa ADD CONSTRAINT FK_CF65374BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE eleveur_spa');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E533062D77 FOREIGN KEY (eleveur_spa_id) REFERENCES elveurs_spa (id)');
    }
}
