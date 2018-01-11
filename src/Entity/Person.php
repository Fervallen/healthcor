<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $birthDate;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $height;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $male;
}
