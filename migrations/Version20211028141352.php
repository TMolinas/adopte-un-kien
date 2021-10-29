<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211028141352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418634DFEB');
        $this->addSql('DROP INDEX IDX_14B78418634DFEB ON photo');
        $this->addSql('ALTER TABLE photo CHANGE dog_id dogs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418D0AFB20A FOREIGN KEY (dogs_id) REFERENCES dog (id)');
        $this->addSql('CREATE INDEX IDX_14B78418D0AFB20A ON photo (dogs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418D0AFB20A');
        $this->addSql('DROP INDEX IDX_14B78418D0AFB20A ON photo');
        $this->addSql('ALTER TABLE photo CHANGE dogs_id dog_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('CREATE INDEX IDX_14B78418634DFEB ON photo (dog_id)');
    }
}
