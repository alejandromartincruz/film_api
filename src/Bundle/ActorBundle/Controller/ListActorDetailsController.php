<?php

namespace Bundle\ActorBundle\Controller;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorDetailsController extends Controller
{
    public function executeAction($actorId)
    {
        $id = (int) $actorId;

        $actor = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findOneByIdJoinedToFilm($id);

        return $this->render('ActorBundle:Default:details.html.twig', ['actor' => $actor] );
    }
}
