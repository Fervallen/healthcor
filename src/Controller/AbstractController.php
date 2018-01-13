<?php

namespace App\Controller;

use App\Entity\AbstractEntity;
use App\Repository\AbstractRepository;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AbstractController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @var string
     */
    protected static $entityClass;

    /**
     * @param int $id
     * @return AbstractEntity|JsonResponse|object
     */
    public function getAction($id)
    {
        $entity = $this->getRepository()->find($id);
        if (!$entity) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
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
     * @return AbstractEntity
     */
    public function postAction(Request $request)
    {
        $entity = new static::$entityClass(json_decode($request->getContent(), true));
	    $this->saveEntity($entity);

        return $entity;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return AbstractEntity
     */
    public function patchAction($id, Request $request)
    {
        $entity = $this->getAction($id);
        if ($entity instanceof View) {
            return $entity;
        }
        $entity->setAttributes(json_decode($request->getContent(), true));
	    $this->saveEntity($entity);

        return $entity;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function deleteAction($id)
    {
        $entity = $this->getAction($id);
        if ($entity instanceof View) {
            return $entity;
        }
        $this->getDoctrine()->getManager()->remove($entity);
	    $this->getDoctrine()->getManager()->flush();

        return new JsonResponse();
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
