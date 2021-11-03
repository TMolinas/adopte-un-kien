<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211028093333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dog_photo');
        $this->addSql('ALTER TABLE dog DROP nb_dogs, CHANGE breed breed VARCHAR(255) DEFAULT NULL, CHANGE age age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD dog_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('CREATE INDEX IDX_14B78418634DFEB ON photo (dog_id)');
        $this->addSql('ALTER TABLE user CHANGE adresse_id adresse_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dog_photo (dog_id INT NOT NULL, photo_id INT NOT NULL, INDEX IDX_8F11CD5D634DFEB (dog_id), INDEX IDX_8F11CD5D7E9E4C8C (photo_id), PRIMARY KEY(dog_id, photo_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE dog_photo ADD CONSTRAINT FK_8F11CD5D634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog_photo ADD CONSTRAINT FK_8F11CD5D7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog ADD nb_dogs INT NOT NULL, CHANGE breed breed VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE age age INT NOT NULL');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418634DFEB');
        $this->addSql('DROP INDEX IDX_14B78418634DFEB ON photo');
        $this->addSql('ALTER TABLE photo DROP dog_id');
        $this->addSql('ALTER TABLE user CHANGE adresse_id adresse_id INT NOT NULL');
    }
}
