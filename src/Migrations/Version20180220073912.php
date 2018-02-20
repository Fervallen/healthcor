<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220073912 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DELETE FROM record WHERE morning = true');
        $this->addSql('ALTER TABLE record_alcohol_xref DROP FOREIGN KEY FK_F9D502065357D7EE');
        $this->addSql('ALTER TABLE record_feeding_xref DROP FOREIGN KEY FK_7951C07FF87D5AA5');
        $this->addSql('DROP TABLE alcohol');
        $this->addSql('DROP TABLE feeding');
        $this->addSql('DROP TABLE record_alcohol_xref');
        $this->addSql('DROP TABLE record_feeding_xref');
        $this->addSql('ALTER TABLE record ADD drunk_beer TINYINT(1) NOT NULL, ADD drunk_spirits TINYINT(1) NOT NULL, ADD difficult_falling_asleep_yesterday TINYINT(1) NOT NULL, ADD took_wellman TINYINT(1) NOT NULL, ADD took_energy_vitrum TINYINT(1) NOT NULL, ADD felt_ill TINYINT(1) NOT NULL, ADD was_ill TINYINT(1) NOT NULL, ADD date_time DATETIME NOT NULL, DROP morning, DROP difficult_falling_asleep');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alcohol (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feeding (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE record_alcohol_xref (record_id INT NOT NULL, alcohol_id INT NOT NULL, INDEX IDX_F9D502064DFD750C (record_id), INDEX IDX_F9D502065357D7EE (alcohol_id), PRIMARY KEY(record_id, alcohol_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE record_feeding_xref (record_id INT NOT NULL, feeding_id INT NOT NULL, INDEX IDX_7951C07F4DFD750C (record_id), INDEX IDX_7951C07FF87D5AA5 (feeding_id), PRIMARY KEY(record_id, feeding_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE record_alcohol_xref ADD CONSTRAINT FK_F9D502064DFD750C FOREIGN KEY (record_id) REFERENCES record (id)');
        $this->addSql('ALTER TABLE record_alcohol_xref ADD CONSTRAINT FK_F9D502065357D7EE FOREIGN KEY (alcohol_id) REFERENCES alcohol (id)');
        $this->addSql('ALTER TABLE record_feeding_xref ADD CONSTRAINT FK_7951C07F4DFD750C FOREIGN KEY (record_id) REFERENCES record (id)');
        $this->addSql('ALTER TABLE record_feeding_xref ADD CONSTRAINT FK_7951C07FF87D5AA5 FOREIGN KEY (feeding_id) REFERENCES feeding (id)');
        $this->addSql('ALTER TABLE record ADD morning TINYINT(1) NOT NULL, ADD difficult_falling_asleep TINYINT(1) NOT NULL, DROP drunk_beer, DROP drunk_spirits, DROP difficult_falling_asleep_yesterday, DROP took_wellman, DROP took_energy_vitrum, DROP felt_ill, DROP was_ill, DROP date_time');
    }
}
