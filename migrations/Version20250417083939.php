<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417083939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE majerome_workshop_brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_DD86373177153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE majerome_workshop_plugin_brand_channel (brand_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_DAACAB8E44F5D008 (brand_id), INDEX IDX_DAACAB8E72F5A1AA (channel_id), PRIMARY KEY(brand_id, channel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE majerome_workshop_brand_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_6A5A0C4D2C2AC5D3 (translatable_id), UNIQUE INDEX majerome_workshop_brand_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE majerome_workshop_plugin_brand_channel ADD CONSTRAINT FK_DAACAB8E44F5D008 FOREIGN KEY (brand_id) REFERENCES majerome_workshop_brand (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE majerome_workshop_plugin_brand_channel ADD CONSTRAINT FK_DAACAB8E72F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE majerome_workshop_brand_translation ADD CONSTRAINT FK_6A5A0C4D2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES majerome_workshop_brand (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sylius_product ADD brand_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B7444F5D008 FOREIGN KEY (brand_id) REFERENCES majerome_workshop_brand (id) ON DELETE SET NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_677B9B7444F5D008 ON sylius_product (brand_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', CHANGE available_at available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B7444F5D008
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE majerome_workshop_plugin_brand_channel DROP FOREIGN KEY FK_DAACAB8E44F5D008
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE majerome_workshop_plugin_brand_channel DROP FOREIGN KEY FK_DAACAB8E72F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE majerome_workshop_brand_translation DROP FOREIGN KEY FK_6A5A0C4D2C2AC5D3
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE majerome_workshop_brand
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE majerome_workshop_plugin_brand_channel
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE majerome_workshop_brand_translation
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_677B9B7444F5D008 ON sylius_product
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sylius_product DROP brand_id
        SQL);
    }
}
