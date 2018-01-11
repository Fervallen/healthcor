<?php

namespace App\Controller;

use App\Entity\Alcohol;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("alcohol", pluralize=false)
 */
class AlcoholController extends AbstractController
{
    /**
     * @var string
     */
    protected static $entityClass = Alcohol::class;
}
