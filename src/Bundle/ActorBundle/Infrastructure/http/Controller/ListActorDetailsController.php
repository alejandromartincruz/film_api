<?php

namespace Bundle\ActorBundle\Infrastructure\http\Controller;

use Bundle\ActorBundle\Domain\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorDetailsController extends Controller
{
    public function executeAction($actorId)
    {
        $id = (int) $actorId;

        $actor = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findOneById($id);

        $actor = $actor->toArray($actor);

        return $this->render('ActorBundle:Default:details.html.twig', ['actor' => $actor] );
    }
}
