<?php

namespace Bundle\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorDetailsController extends Controller
{
    public function executeAction($actorId)
    {
        $id = (int) $actorId;

        $em = $this->getDoctrine()->getManager();
        $actor = $em->getReference('ActorBundle:Actor', $id);
        return $this->render('ActorBundle:Default:details.html.twig', ['actor' => $actor] );
    }
}
