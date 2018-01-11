<?php

namespace App\Controller;

use App\Entity\AbstractEntity;
use App\Entity\Record;
use App\Repository\AbstractRepository;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AbstractController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @var string
     */
    protected static $entityClass;

    /**
     * @return AbstractEntity|View
     */
    public function newAction()
    {
        $entity = $this->getRepository()->findLast();
        if (!$entity) {
            return new View('No records exist');
        }

        return $entity;
    }

    /**
     * @param int $id
     * @return AbstractEntity|View|object
     */
    public function getAction($id)
    {
        $entity = $this->getRepository()->find($id);
        if (!$entity) {
            return new View('Record not found', Response::HTTP_NOT_FOUND);
        }

        return $entity;
    }

    /**
     * @return AbstractEntity[]|View
     */
    public function cgetAction()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * @param Request $request
     * @return View
     */
    public function postAction(Request $request)
    {
        $entity = new static::$entityClass($request);
	    $this->saveEntity($entity);

        return new View('Entity added', Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return View
     */
    public function patchAction($id, Request $request)
    {
        $entity = $this->getAction($id);
        if ($entity instanceof View) {
            return $entity;
        }
        $entity->setAttributesFromRequest($request);
	    $this->saveEntity($entity);

        return new View('Entity updated');
    }

    /**
     * @param int $id
     * @return View
     */
    public function deleteAction($id)
    {
        $entity = $this->getAction($id);
        if ($entity instanceof View) {
            return $entity;
        }
        $this->getDoctrine()->getManager()->remove($entity);
	    $this->getDoctrine()->getManager()->flush();

        return new View('Entity removed');
    }

    /**
     * @return AbstractRepository|ObjectRepository
     */
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository(static::$entityClass);
    }

	/**
	 * @param AbstractEntity $entity
	 */
	protected function saveEntity($entity)
	{
		$this->getDoctrine()->getManager()->persist($entity);
		$this->getDoctrine()->getManager()->flush();
	}
}
