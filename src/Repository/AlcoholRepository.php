<?php

namespace App\Repository;

use App\Entity\Alcohol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AlcoholRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected static $entityClass = Alcohol::class;
}
