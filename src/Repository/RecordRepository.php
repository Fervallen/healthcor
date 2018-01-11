<?php

namespace App\Repository;

use App\Entity\Record;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RecordRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected static $entityClass = Record::class;
}
