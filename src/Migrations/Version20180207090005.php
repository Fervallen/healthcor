<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180207090005 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE person');
        $this->addSql('ALTER TABLE record ADD mastrubated TINYINT(1) NOT NULL, ADD woke_up_on_time TINYINT(1) NOT NULL, ADD went_to_bed_on_time TINYINT(1) NOT NULL, ADD difficult_wake_up TINYINT(1) NOT NULL, ADD difficult_falling_asleep TINYINT(1) NOT NULL, ADD had_agood_breakfast TINYINT(1) NOT NULL, ADD eat_late TINYINT(1) NOT NULL, ADD took_caffeine TINYINT(1) NOT NULL, ADD drank_sparkling_liquids TINYINT(1) NOT NULL, ADD had_at_least_one_success TINYINT(1) NOT NULL, ADD had_nice_extraordinary_event TINYINT(1) NOT NULL, ADD played_games TINYINT(1) NOT NULL, ADD did_some_learning TINYINT(1) NOT NULL, ADD day_difficulty INT DEFAULT NULL, ADD day_success INT DEFAULT NULL, ADD food_fitness_level INT DEFAULT NULL, DROP been_to_tom_sour, DROP had_dinner_at_restaurant, CHANGE stress_level stress_level INT DEFAULT NULL, CHANGE fatigue_level fatigue_level INT DEFAULT NULL, CHANGE inspiration_level inspiration_level INT DEFAULT NULL, CHANGE will_power_level will_power_level INT DEFAULT NULL, CHANGE productivity_level productivity_level INT DEFAULT NULL, CHANGE pulse pulse INT DEFAULT NULL, CHANGE steps steps INT DEFAULT NULL, CHANGE sleep_duration sleep_duration DOUBLE PRECISION DEFAULT NULL, CHANGE sleep_quality sleep_quality DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, birth_date DATETIME NOT NULL, height INT NOT NULL, male TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE record ADD been_to_tom_sour TINYINT(1) NOT NULL, ADD had_dinner_at_restaurant TINYINT(1) NOT NULL, DROP mastrubated, DROP woke_up_on_time, DROP went_to_bed_on_time, DROP difficult_wake_up, DROP difficult_falling_asleep, DROP had_agood_breakfast, DROP eat_late, DROP took_caffeine, DROP drank_sparkling_liquids, DROP had_at_least_one_success, DROP had_nice_extraordinary_event, DROP played_games, DROP did_some_learning, DROP day_difficulty, DROP day_success, DROP food_fitness_level, CHANGE stress_level stress_level INT NOT NULL, CHANGE fatigue_level fatigue_level INT NOT NULL, CHANGE inspiration_level inspiration_level INT NOT NULL, CHANGE will_power_level will_power_level INT NOT NULL, CHANGE productivity_level productivity_level INT NOT NULL, CHANGE pulse pulse INT NOT NULL, CHANGE steps steps INT NOT NULL, CHANGE sleep_quality sleep_quality DOUBLE PRECISION NOT NULL, CHANGE sleep_duration sleep_duration DOUBLE PRECISION NOT NULL');
    }
}
