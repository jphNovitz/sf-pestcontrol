<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260626230000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add configurable header tagline to site settings.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE site_settings ADD COLUMN header_tagline VARCHAR(120) NOT NULL DEFAULT 'Intervention en Brabant wallon'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE TEMPORARY TABLE __temp__site_settings AS SELECT id, site_name, logo_filename, favicon_filename, logo_alt, hero_title, hero_subtitle, whatsapp_phone_number, whatsapp_message, notification_email, emergency_notice, form_intro FROM site_settings');
        $this->addSql('DROP TABLE site_settings');
        $this->addSql('CREATE TABLE site_settings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, site_name VARCHAR(120) NOT NULL, logo_filename VARCHAR(255) DEFAULT NULL, favicon_filename VARCHAR(255) DEFAULT NULL, logo_alt VARCHAR(180) NOT NULL DEFAULT \'Logo Guêpes & Frelons Intervention\', hero_title VARCHAR(180) NOT NULL, hero_subtitle CLOB NOT NULL, whatsapp_phone_number VARCHAR(40) NOT NULL, whatsapp_message CLOB NOT NULL, notification_email VARCHAR(180) NOT NULL, emergency_notice CLOB NOT NULL, form_intro CLOB NOT NULL)');
        $this->addSql('INSERT INTO site_settings (id, site_name, logo_filename, favicon_filename, logo_alt, hero_title, hero_subtitle, whatsapp_phone_number, whatsapp_message, notification_email, emergency_notice, form_intro) SELECT id, site_name, logo_filename, favicon_filename, logo_alt, hero_title, hero_subtitle, whatsapp_phone_number, whatsapp_message, notification_email, emergency_notice, form_intro FROM __temp__site_settings');
        $this->addSql('DROP TABLE __temp__site_settings');
    }
}
