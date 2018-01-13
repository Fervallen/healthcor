<?php

namespace App\Controller;

use App\Entity\AbstractEntity;
use App\Entity\Record;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @return Record|AbstractEntity|JsonResponse
     */
    public function last()
    {
        $entity = $this->getRepository()->findLast();
        if (!$entity) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        return $entity;
    }
}
