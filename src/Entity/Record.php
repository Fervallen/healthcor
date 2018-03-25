<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecordRepository")
 */
class Record extends AbstractEntity
{
    const NEW_DAY_STARTS_AT = 5;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $drankYesterday;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $drunk;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $drunkBeer;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $drunkSpirits;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $exercised;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $run;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $bike;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $hadSex;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $mastrubated;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $walked;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $glutedOneself;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $hadShower;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $wokeUpOnTime;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $wentToBedOnTime;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $difficultWakeUp;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $difficultFallingAsleepYesterday;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $tookVitamins;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $tookWellman;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $tookEnergyVitrum;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $hadAGoodBreakfast;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $eatLate;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $tookCaffeine;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $drankSparklingLiquids;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $hadAtLeastOneSuccess;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $hadNiceExtraordinaryEvent;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $playedGames;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $didSomeLearning;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $pessimisticMindset;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $feltIll;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $wasIll;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $dayDifficulty;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $daySuccess;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $foodFitnessLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $stressLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $fatigueLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $inspirationLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $willPowerLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $productivityLevel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $bloodPressureHigh;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $bloodPressureLow;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $pulse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $steps;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var int
     */
    protected $sleepQuality;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    protected $weight;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    protected $sleepDuration;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $date;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $dateTime;

    public function __construct(array $attributes)
    {
        $date = null;
        if (!empty($attributes['date'])) {
            if (strlen($attributes['date']) > 10) {
                $attributes['date'] = substr($attributes['date'], 0, 10);
            }
            $date = $this->getDate($attributes['date']);
            unset($attributes['date']);
        }
        $this->setDateAndTime($date);

        return parent::__construct($attributes);
    }

    private function setDateAndTime(?\DateTime $date)
    {
        if ($date) {
            $this->dateTime = $date;
        } else {
            $this->dateTime = $this->getDate('now');
            if ($this->dateTime->format('H') < self::NEW_DAY_STARTS_AT) {
                $this->dateTime->modify('-1 day');
                $this->dateTime->setTime(23, 0, 0);
            }
        }
        $this->date = clone($this->dateTime);
        $this->date->setTime(23, 0, 0);
    }

    private function getDate(string $dateString): \DateTime
    {
        return new \DateTime($dateString, new \DateTimeZone('Europe/Kiev'));
    }
}
