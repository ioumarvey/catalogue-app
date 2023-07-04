<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230701132602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tasks_favorited (task_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_BAB312908DB60186 (task_id), INDEX IDX_BAB31290A76ED395 (user_id), PRIMARY KEY(task_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tasks_favorited ADD CONSTRAINT FK_BAB312908DB60186 FOREIGN KEY (task_id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tasks_favorited ADD CONSTRAINT FK_BAB31290A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_favorited DROP FOREIGN KEY FK_BAB312908DB60186');
        $this->addSql('ALTER TABLE tasks_favorited DROP FOREIGN KEY FK_BAB31290A76ED395');
        $this->addSql('DROP TABLE tasks_favorited');
    }
}
