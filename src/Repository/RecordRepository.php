<?php

namespace App\Repository;

use App\Entity\Record;

class RecordRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected static $entityClass = Record::class;
}
