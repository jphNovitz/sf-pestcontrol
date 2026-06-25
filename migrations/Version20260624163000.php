<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260624163000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add editable landing settings, intervention zones, landing advice and intervention requests.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE site_settings (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, site_name VARCHAR(120) NOT NULL, hero_title VARCHAR(180) NOT NULL, hero_subtitle CLOB NOT NULL, whatsapp_phone_number VARCHAR(40) NOT NULL, whatsapp_message CLOB NOT NULL, notification_email VARCHAR(180) NOT NULL, emergency_notice CLOB NOT NULL, form_intro CLOB NOT NULL)");
        $this->addSql("CREATE TABLE intervention_zone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(120) NOT NULL, position INTEGER NOT NULL, is_active BOOLEAN NOT NULL)");
        $this->addSql("CREATE TABLE landing_advice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(120) NOT NULL, body CLOB NOT NULL, position INTEGER NOT NULL, is_active BOOLEAN NOT NULL)");
        $this->addSql("CREATE TABLE intervention_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(120) NOT NULL, phone VARCHAR(40) NOT NULL, city VARCHAR(120) NOT NULL, address VARCHAR(255) NOT NULL, pest_type VARCHAR(80) NOT NULL, nest_location VARCHAR(120) NOT NULL, urgency VARCHAR(80) NOT NULL, message CLOB DEFAULT NULL, photo_filename VARCHAR(255) DEFAULT NULL, status VARCHAR(40) NOT NULL, internal_notes CLOB DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )");

        $this->addSql("INSERT INTO site_settings (site_name, hero_title, hero_subtitle, whatsapp_phone_number, whatsapp_message, notification_email, emergency_notice, form_intro) VALUES ('Guêpes & Frelons Intervention', 'Intervention guêpes et frelons en Brabant wallon', 'Intervention par un indépendant pour sécuriser une habitation, un jardin ou un local professionnel. Décrivez la situation, gardez vos distances et préparez les informations utiles.', '+32400000000', 'Bonjour, je souhaite une intervention pour un nid de guêpes/frelons en Brabant wallon.', 'independant@gmail.com', 'Danger immédiat, allergie connue ou attaque en cours ? Contactez directement via WhatsApp plutôt que d''attendre une réponse au formulaire.', 'Ce formulaire prépare la prise de contact. Il enregistre la demande et transmet les informations à l''indépendant.')");
        $this->addSql("INSERT INTO intervention_zone (name, position, is_active) VALUES ('Brabant wallon', 1, 1)");
        $this->addSql("INSERT INTO landing_advice (title, body, position, is_active) VALUES ('Ne bouchez pas l''entrée', 'Bloquer le passage peut déplacer l''activité vers l''intérieur du bâtiment et compliquer l''intervention.', 1, 1)");
        $this->addSql("INSERT INTO landing_advice (title, body, position, is_active) VALUES ('Gardez une distance de sécurité', 'Evitez les vibrations, les jets d''eau et les tentatives de destruction avec des produits non adaptés.', 2, 1)");
        $this->addSql("INSERT INTO landing_advice (title, body, position, is_active) VALUES ('Préparez l''accès', 'Indiquez la hauteur, l''endroit exact et les obstacles éventuels pour faciliter le diagnostic.', 3, 1)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE intervention_request');
        $this->addSql('DROP TABLE landing_advice');
        $this->addSql('DROP TABLE intervention_zone');
        $this->addSql('DROP TABLE site_settings');
    }
}
