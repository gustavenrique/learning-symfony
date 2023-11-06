<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106024412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adding column [image_url] in table [actor]';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE actor ADD image_url VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE actor DROP image_url');
    }
}
