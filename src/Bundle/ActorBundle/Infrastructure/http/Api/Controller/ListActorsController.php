<?php

namespace Bundle\ActorBundle\Infrastructure\http\Api\Controller;

use Bundle\ActorBundle\Application\Usecase\ReadActor;
use Bundle\ActorBundle\Domain\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListActorsController extends Controller
{
    private $readActorCase;

    public function __construct(
        ReadActor $readActorCase
    )
    {
        $this->readActorCase = $readActorCase;
    }

    public function executeAction()
    {
        $actors = $this->readActorCase->execute();

        $actorsAsArray = array_map(function (Actor $a) {
            return $a->toArray($a);
        }, $actors);

        return new JsonResponse($actorsAsArray);
    }

}
