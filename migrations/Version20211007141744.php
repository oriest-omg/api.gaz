<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007141744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE echanger_gaz ADD gaz_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE echanger_gaz ADD CONSTRAINT FK_C9A1111C9DE39C66 FOREIGN KEY (gaz_id) REFERENCES gaz (id)');
        $this->addSql('CREATE INDEX IDX_C9A1111C9DE39C66 ON echanger_gaz (gaz_id)');
        $this->addSql('ALTER TABLE remplacer_gaz ADD gaz_id INT DEFAULT NULL, ADD fournisseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE remplacer_gaz ADD CONSTRAINT FK_DD8763CC9DE39C66 FOREIGN KEY (gaz_id) REFERENCES gaz (id)');
        $this->addSql('ALTER TABLE remplacer_gaz ADD CONSTRAINT FK_DD8763CC670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE INDEX IDX_DD8763CC9DE39C66 ON remplacer_gaz (gaz_id)');
        $this->addSql('CREATE INDEX IDX_DD8763CC670C757F ON remplacer_gaz (fournisseur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE echanger_gaz DROP FOREIGN KEY FK_C9A1111C9DE39C66');
        $this->addSql('DROP INDEX IDX_C9A1111C9DE39C66 ON echanger_gaz');
        $this->addSql('ALTER TABLE echanger_gaz DROP gaz_id');
        $this->addSql('ALTER TABLE remplacer_gaz DROP FOREIGN KEY FK_DD8763CC9DE39C66');
        $this->addSql('ALTER TABLE remplacer_gaz DROP FOREIGN KEY FK_DD8763CC670C757F');
        $this->addSql('DROP INDEX IDX_DD8763CC9DE39C66 ON remplacer_gaz');
        $this->addSql('DROP INDEX IDX_DD8763CC670C757F ON remplacer_gaz');
        $this->addSql('ALTER TABLE remplacer_gaz DROP gaz_id, DROP fournisseur_id');
    }
}
