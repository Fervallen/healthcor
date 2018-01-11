<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171215135552 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alcohol (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feeding (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, height INT NOT NULL, male TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE record (id INT AUTO_INCREMENT NOT NULL, drank_yesterday TINYINT(1) NOT NULL, drunk TINYINT(1) NOT NULL, exercised TINYINT(1) NOT NULL, run TINYINT(1) NOT NULL, had_sex TINYINT(1) NOT NULL, walked TINYINT(1) NOT NULL, been_to_tom_sour TINYINT(1) NOT NULL, had_dinner_at_restaraunt TINYINT(1) NOT NULL, gluted_oneself TINYINT(1) NOT NULL, stress_level INT NOT NULL, fatigue_level INT NOT NULL, inspiration_level INT NOT NULL, will_power_level INT NOT NULL, productivity_level INT NOT NULL, blood_pressure_high INT NOT NULL, blood_pressure_low INT NOT NULL, pulse INT NOT NULL, steps INT NOT NULL, weight DOUBLE PRECISION NOT NULL, sleep_duration DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, type TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE record_feeding_xref (record_id INT NOT NULL, feeding_id INT NOT NULL, INDEX IDX_7951C07F4DFD750C (record_id), INDEX IDX_7951C07FF87D5AA5 (feeding_id), PRIMARY KEY(record_id, feeding_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE record_alcohol_xref (record_id INT NOT NULL, alcohol_id INT NOT NULL, INDEX IDX_F9D502064DFD750C (record_id), INDEX IDX_F9D502065357D7EE (alcohol_id), PRIMARY KEY(record_id, alcohol_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE record_feeding_xref ADD CONSTRAINT FK_7951C07F4DFD750C FOREIGN KEY (record_id) REFERENCES record (id)');
        $this->addSql('ALTER TABLE record_feeding_xref ADD CONSTRAINT FK_7951C07FF87D5AA5 FOREIGN KEY (feeding_id) REFERENCES feeding (id)');
        $this->addSql('ALTER TABLE record_alcohol_xref ADD CONSTRAINT FK_F9D502064DFD750C FOREIGN KEY (record_id) REFERENCES record (id)');
        $this->addSql('ALTER TABLE record_alcohol_xref ADD CONSTRAINT FK_F9D502065357D7EE FOREIGN KEY (alcohol_id) REFERENCES alcohol (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE record_alcohol_xref DROP FOREIGN KEY FK_F9D502065357D7EE');
        $this->addSql('ALTER TABLE record_feeding_xref DROP FOREIGN KEY FK_7951C07FF87D5AA5');
        $this->addSql('ALTER TABLE record_feeding_xref DROP FOREIGN KEY FK_7951C07F4DFD750C');
        $this->addSql('ALTER TABLE record_alcohol_xref DROP FOREIGN KEY FK_F9D502064DFD750C');
        $this->addSql('DROP TABLE alcohol');
        $this->addSql('DROP TABLE feeding');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE record');
        $this->addSql('DROP TABLE record_feeding_xref');
        $this->addSql('DROP TABLE record_alcohol_xref');
    }
}
