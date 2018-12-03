<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181203202857 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bugreport DROP FOREIGN KEY bugreport_ibfk_1');
        $this->addSql('ALTER TABLE bugreport DROP FOREIGN KEY bugreport_ibfk_2');
        $this->addSql('ALTER TABLE bugreport DROP FOREIGN KEY bugreport_ibfk_3');
        $this->addSql('ALTER TABLE bugreport CHANGE user_id user_id INT DEFAULT NULL, CHANGE status_id status_id INT DEFAULT NULL, CHANGE classification_id classification_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bugreport ADD CONSTRAINT FK_4BD08634A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bugreport ADD CONSTRAINT FK_4BD086346BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE bugreport ADD CONSTRAINT FK_4BD086342A86559F FOREIGN KEY (classification_id) REFERENCES classification (id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY comment_ibfk_1');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY comment_ibfk_2');
        $this->addSql('ALTER TABLE comment CHANGE user_id user_id INT DEFAULT NULL, CHANGE bug_id bug_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CFA3DB3D5 FOREIGN KEY (bug_id) REFERENCES bugreport (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bugreport DROP FOREIGN KEY FK_4BD08634A76ED395');
        $this->addSql('ALTER TABLE bugreport DROP FOREIGN KEY FK_4BD086346BF700BD');
        $this->addSql('ALTER TABLE bugreport DROP FOREIGN KEY FK_4BD086342A86559F');
        $this->addSql('ALTER TABLE bugreport CHANGE user_id user_id INT NOT NULL, CHANGE status_id status_id INT NOT NULL, CHANGE classification_id classification_id INT NOT NULL');
        $this->addSql('ALTER TABLE bugreport ADD CONSTRAINT bugreport_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE bugreport ADD CONSTRAINT bugreport_ibfk_2 FOREIGN KEY (status_id) REFERENCES status (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE bugreport ADD CONSTRAINT bugreport_ibfk_3 FOREIGN KEY (classification_id) REFERENCES classification (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFA3DB3D5');
        $this->addSql('ALTER TABLE comment CHANGE user_id user_id INT NOT NULL, CHANGE bug_id bug_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT comment_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT comment_ibfk_2 FOREIGN KEY (bug_id) REFERENCES bugreport (id) ON UPDATE CASCADE');
    }
}
