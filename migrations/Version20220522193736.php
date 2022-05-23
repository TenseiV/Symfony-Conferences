<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220522193736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_880e0d7675e735a9');
        $this->addSql('ALTER TABLE admin RENAME COLUMN yes TO username');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76F85E0677 ON admin (username)');
        $this->addSql("INSERT INTO admin (id, username, roles, password) \
        VALUES (nextval('admin_id_seq'), 'admin', '[\"ROLE_ADMIN\"]', \
        '\$argon2id\$v=19\$m=65536,t=4,p=1\$BQG+jovPcunctc30xG5PxQ\$TiGbx451NKdo+g9vLtfkMy4KjASKSOcnNxjij4gTX1s')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_880E0D76F85E0677');
        $this->addSql('ALTER TABLE admin RENAME COLUMN username TO yes');
        $this->addSql('CREATE UNIQUE INDEX uniq_880e0d7675e735a9 ON admin (yes)');
    }
}
