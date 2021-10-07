<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007140838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32C3F8842E');
        $this->addSql('DROP INDEX IDX_369ECA32C3F8842E ON fournisseur');
        $this->addSql('ALTER TABLE fournisseur DROP remplacer_gaz_id');
        $this->addSql('ALTER TABLE gaz DROP FOREIGN KEY FK_7EEFC67381752F83');
        $this->addSql('ALTER TABLE gaz DROP FOREIGN KEY FK_7EEFC673C3F8842E');
        $this->addSql('DROP INDEX IDX_7EEFC673C3F8842E ON gaz');
        $this->addSql('DROP INDEX IDX_7EEFC67381752F83 ON gaz');
        $this->addSql('ALTER TABLE gaz DROP remplacer_gaz_id, DROP echanger_gaz_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseur ADD remplacer_gaz_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32C3F8842E FOREIGN KEY (remplacer_gaz_id) REFERENCES remplacer_gaz (id)');
        $this->addSql('CREATE INDEX IDX_369ECA32C3F8842E ON fournisseur (remplacer_gaz_id)');
        $this->addSql('ALTER TABLE gaz ADD remplacer_gaz_id INT DEFAULT NULL, ADD echanger_gaz_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gaz ADD CONSTRAINT FK_7EEFC67381752F83 FOREIGN KEY (echanger_gaz_id) REFERENCES echanger_gaz (id)');
        $this->addSql('ALTER TABLE gaz ADD CONSTRAINT FK_7EEFC673C3F8842E FOREIGN KEY (remplacer_gaz_id) REFERENCES remplacer_gaz (id)');
        $this->addSql('CREATE INDEX IDX_7EEFC673C3F8842E ON gaz (remplacer_gaz_id)');
        $this->addSql('CREATE INDEX IDX_7EEFC67381752F83 ON gaz (echanger_gaz_id)');
    }
}
