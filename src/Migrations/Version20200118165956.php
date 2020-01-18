<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200118165956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE configur (
            id int(11) NOT NULL,
            tax_rate int(11) NOT NULL,
            tax_flag tinyint(1) NOT NULL,
            global_discount int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;');

        $this->addSql('CREATE TABLE naudotojas (
            id int(11) NOT NULL,
            email varchar(180) COLLATE utf8_lithuanian_ci NOT NULL,
            roles text COLLATE utf8_lithuanian_ci NOT NULL,
            password varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;');

        $this->addSql('CREATE TABLE preke (
            id int(11) NOT NULL,
            pavadinimas varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
            SKU varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
            status varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
            base_price decimal(10,0) NOT NULL,
            special_price decimal(10,0) NOT NULL,
            image varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
            description text COLLATE utf8_lithuanian_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;');

        $this->addSql('CREATE TABLE review (
            id int(11) NOT NULL,
            product_id int(11) NOT NULL,
            text text COLLATE utf8_lithuanian_ci NOT NULL,
            rate int(1) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE configur');
        $this->addSql('DROP TABLE naudotojas');
        $this->addSql('DROP TABLE preke');
        $this->addSql('DROP TABLE review');
    }
}
