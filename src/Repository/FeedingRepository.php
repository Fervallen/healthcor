<?php

namespace App\Repository;

use App\Entity\Feeding;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FeedingRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected static $entityClass = Feeding::class;
}
