<?php

namespace Bundle\ActorBundle\Infraestructure\http\Controller;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorDetailsController extends Controller
{
    public function executeAction($actorId)
    {
        $id = (int) $actorId;

        $actor = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findOneById($id);

        return $this->render('ActorBundle:Default:details.html.twig', ['actor' => $actor] );
    }
}
