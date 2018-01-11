<?php

namespace App\Repository;

use App\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PersonRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected static $entityClass = Person::class;
}
