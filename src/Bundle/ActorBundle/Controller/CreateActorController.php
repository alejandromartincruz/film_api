<?php

namespace Bundle\ActorBundle\Controller;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateActorController extends Controller
{
    public function executeAction(Request $request)
    {

        $name = $request->query->get('name');

        $actor = new Actor($name);

        $em = $this->getDoctrine()->getManager();

        $em->persist($actor);
        $em->flush();

        return new Response('Actor creado correctamente', 201);
    }
}
