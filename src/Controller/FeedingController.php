<?php

namespace App\Controller;

use App\Entity\Feeding;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("feeding", pluralize=false)
 */
class FeedingController extends AbstractController
{
    /**
     * @var string
     */
    protected static $entityClass = Feeding::class;
}
