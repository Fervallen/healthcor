<?php

namespace App\Controller;

use App\Entity\Person;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("person", pluralize=false)
 */
class PersonController extends AbstractController
{
    /**
     * @var string
     */
    protected static $entityClass = Person::class;
}
