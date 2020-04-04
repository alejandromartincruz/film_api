<?php

namespace Bundle\ActorBundle\Infraestructure\http\Api\Controller;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListActorsController extends Controller
{
    public function executeAction()
    {
        $actors = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findAllOrderedByName();

        $actorsAsArray = array_map(function (Actor $a) {
            return $a->toArray($a);
        }, $actors);

        return new JsonResponse($actorsAsArray);
    }

}
