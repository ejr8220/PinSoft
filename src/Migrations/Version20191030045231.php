<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030045231 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE General.provincia DROP CONSTRAINT provincia_pais_id_fkey');
        $this->addSql('ALTER TABLE General.ciudad DROP CONSTRAINT ciudad_provincia_id_fkey');
        $this->addSql('DROP SEQUENCE General.seq_pais CASCADE');
        $this->addSql('DROP SEQUENCE General.seq_provincia CASCADE');
        $this->addSql('DROP SEQUENCE General.seq_ciudad CASCADE');
        $this->addSql('DROP SEQUENCE General.provincia_id_provincia_seq CASCADE');
        $this->addSql('DROP SEQUENCE General.ciudad_id_ciudad_seq CASCADE');
        $this->addSql('CREATE SEQUENCE prueba_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE SEQ_PAIS INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE prueba (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pais (ID_PAIS INT NOT NULL, codigo INT NOT NULL, iso2 VARCHAR(255) NOT NULL, iso3 VARCHAR(255) NOT NULL, NOMBRE_PAIS VARCHAR(255) NOT NULL, PRIMARY KEY(ID_PAIS))');
        $this->addSql('DROP TABLE General.pais');
        $this->addSql('DROP TABLE General.provincia');
        $this->addSql('DROP TABLE General.ciudad');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA General');
        $this->addSql('CREATE SCHEMA Seguridad');
        $this->addSql('CREATE SCHEMA Contabilidad');
        $this->addSql('CREATE SCHEMA Compras');
        $this->addSql('CREATE SCHEMA Tesoreria');
        $this->addSql('CREATE SCHEMA Facturacion');
        $this->addSql('CREATE SCHEMA Inventarios');
        $this->addSql('CREATE SCHEMA Nomina');
        $this->addSql('CREATE SCHEMA RolesPago');
        $this->addSql('DROP SEQUENCE prueba_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE SEQ_PAIS CASCADE');
        $this->addSql('CREATE SEQUENCE General.seq_pais INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE General.seq_provincia INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE General.seq_ciudad INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE General.provincia_id_provincia_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE General.ciudad_id_ciudad_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE General.pais (id_pais BIGSERIAL NOT NULL, codigo SMALLINT DEFAULT NULL, iso2 VARCHAR(2) DEFAULT NULL, iso3 VARCHAR(3) DEFAULT NULL, nombre_pais VARCHAR(70) NOT NULL, PRIMARY KEY(id_pais))');
        $this->addSql('CREATE TABLE General.provincia (id_provincia BIGSERIAL NOT NULL, pais_id BIGINT DEFAULT NULL, codigo VARCHAR(5) NOT NULL, nombre_provincia VARCHAR(70) NOT NULL, PRIMARY KEY(id_provincia))');
        $this->addSql('CREATE INDEX IDX_7863CC8C604D5C6 ON General.provincia (pais_id)');
        $this->addSql('CREATE TABLE General.ciudad (id_ciudad BIGSERIAL NOT NULL, provincia_id BIGINT DEFAULT NULL, codigo VARCHAR(5) NOT NULL, nombre_ciudad VARCHAR(70) NOT NULL, PRIMARY KEY(id_ciudad))');
        $this->addSql('CREATE INDEX IDX_98D55B9D4E7121AF ON General.ciudad (provincia_id)');
        $this->addSql('ALTER TABLE General.provincia ADD CONSTRAINT provincia_pais_id_fkey FOREIGN KEY (pais_id) REFERENCES "General"."pais" (id_pais) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE General.ciudad ADD CONSTRAINT ciudad_provincia_id_fkey FOREIGN KEY (provincia_id) REFERENCES "General"."provincia" (id_provincia) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE prueba');
        $this->addSql('DROP TABLE pais');
    }
}
