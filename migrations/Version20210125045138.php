<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125045138 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE composicion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE material_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mercaderia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE provider_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE composicion (id INT NOT NULL, id_material_id INT NOT NULL, id_mercaderia_id INT NOT NULL, unidad NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C1B12C61FB1A6198 ON composicion (id_material_id)');
        $this->addSql('CREATE INDEX IDX_C1B12C61DA890FC8 ON composicion (id_mercaderia_id)');
        $this->addSql('CREATE TABLE material (id INT NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(12, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE material_mercaderia (material_id INT NOT NULL, mercaderia_id INT NOT NULL, PRIMARY KEY(material_id, mercaderia_id))');
        $this->addSql('CREATE INDEX IDX_5F63A8F7E308AC6F ON material_mercaderia (material_id)');
        $this->addSql('CREATE INDEX IDX_5F63A8F764A1DEAD ON material_mercaderia (mercaderia_id)');
        $this->addSql('CREATE TABLE mercaderia (id INT NOT NULL, provider_id INT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(5) NOT NULL, alto NUMERIC(5, 2) NOT NULL, ancho NUMERIC(5, 2) NOT NULL, profundo NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF51D495A53A8AA ON mercaderia (provider_id)');
        $this->addSql('CREATE TABLE provider (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE composicion ADD CONSTRAINT FK_C1B12C61FB1A6198 FOREIGN KEY (id_material_id) REFERENCES material (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE composicion ADD CONSTRAINT FK_C1B12C61DA890FC8 FOREIGN KEY (id_mercaderia_id) REFERENCES mercaderia (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE material_mercaderia ADD CONSTRAINT FK_5F63A8F7E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE material_mercaderia ADD CONSTRAINT FK_5F63A8F764A1DEAD FOREIGN KEY (mercaderia_id) REFERENCES mercaderia (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mercaderia ADD CONSTRAINT FK_FF51D495A53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE composicion DROP CONSTRAINT FK_C1B12C61FB1A6198');
        $this->addSql('ALTER TABLE material_mercaderia DROP CONSTRAINT FK_5F63A8F7E308AC6F');
        $this->addSql('ALTER TABLE composicion DROP CONSTRAINT FK_C1B12C61DA890FC8');
        $this->addSql('ALTER TABLE material_mercaderia DROP CONSTRAINT FK_5F63A8F764A1DEAD');
        $this->addSql('ALTER TABLE mercaderia DROP CONSTRAINT FK_FF51D495A53A8AA');
        $this->addSql('DROP SEQUENCE composicion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE material_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mercaderia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE provider_id_seq CASCADE');
        $this->addSql('DROP TABLE composicion');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE material_mercaderia');
        $this->addSql('DROP TABLE mercaderia');
        $this->addSql('DROP TABLE provider');
    }
}
