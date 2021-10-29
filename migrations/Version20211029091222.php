<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029091222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('DROP INDEX IDX_F65593E5A76ED395 ON annonce');
        $this->addSql('ALTER TABLE annonce CHANGE user_id eleveur_spa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E533062D77 FOREIGN KEY (eleveur_spa_id) REFERENCES elveurs_spa (id)');
        $this->addSql('CREATE INDEX IDX_F65593E533062D77 ON annonce (eleveur_spa_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418634DFEB');
        $this->addSql('DROP INDEX IDX_14B78418634DFEB ON photo');
        $this->addSql('ALTER TABLE photo CHANGE dog_id dogs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418D0AFB20A FOREIGN KEY (dogs_id) REFERENCES dog (id)');
        $this->addSql('CREATE INDEX IDX_14B78418D0AFB20A ON photo (dogs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E533062D77');
        $this->addSql('DROP INDEX IDX_F65593E533062D77 ON annonce');
        $this->addSql('ALTER TABLE annonce CHANGE eleveur_spa_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5A76ED395 ON annonce (user_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418D0AFB20A');
        $this->addSql('DROP INDEX IDX_14B78418D0AFB20A ON photo');
        $this->addSql('ALTER TABLE photo CHANGE dogs_id dog_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('CREATE INDEX IDX_14B78418634DFEB ON photo (dog_id)');
    }
}
