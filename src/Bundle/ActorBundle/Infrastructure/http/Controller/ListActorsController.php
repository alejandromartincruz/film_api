<?php

namespace Bundle\ActorBundle\Infrastructure\http\Controller;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorsController extends Controller
{
    public function executeAction()
    {
        $actors = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findAllOrderedByName();

        return $this->render('ActorBundle:Default:list.html.twig', ['actors' => $actors] );
    }
}
