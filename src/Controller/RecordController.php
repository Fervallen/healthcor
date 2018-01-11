<?php

namespace App\Controller;

use App\Entity\Record;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("record", pluralize=false)
 */
class RecordController extends AbstractController
{
    /**
     * @var string
     */
    protected static $entityClass = Record::class;

    /**
     * @return int
     */
    public function count()
    {
        return $this->getRepository()->count();
    }
}
