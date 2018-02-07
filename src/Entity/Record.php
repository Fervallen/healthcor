<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecordRepository")
 */
class Record extends AbstractEntity
{
    const MORNING_END_HOUR = 14;

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
    protected $difficultFallingAsleep;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $tookVitamins;

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
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $morning;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Feeding")
     * @ORM\JoinTable(name="record_feeding_xref",
     *   joinColumns={@ORM\JoinColumn(name="record_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="feeding_id", referencedColumnName="id")}
     * )
     * @var ArrayCollection|Feeding[]
     */
    protected $feeding;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Alcohol")
     * @ORM\JoinTable(name="record_alcohol_xref",
     *   joinColumns={@ORM\JoinColumn(name="record_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="alcohol_id", referencedColumnName="id")}
     * )
     * @var ArrayCollection|Alcohol[]
     */
    protected $alcohol;

    /**
     * Record constructor
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->date = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
        $this->morning = ($this->date->format('H') < self::MORNING_END_HOUR);
        $this->feeding = new ArrayCollection();
        $this->alcohol = new ArrayCollection();

        return parent::__construct($attributes);
    }

    /**
     * @param Feeding $feeding
     * @return $this
     */
    public function setFeeding(Feeding $feeding)
    {
        if (!$this->feeding->contains($feeding)) {
            $this->feeding->add($feeding);
        }

        return $this;
    }

    /**
     * @param Alcohol $alcohol
     * @return $this
     */
    public function setAlcohol(Alcohol $alcohol)
    {
        if (!$this->alcohol->contains($alcohol)) {
            $this->alcohol->add($alcohol);
        }

        return $this;
    }
}
