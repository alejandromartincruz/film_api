<?php

namespace Bundle\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateActorController extends Controller
{
    public function executeAction(Request $request)
    {
        $id = $request->query->get('id');
        $name = $request->query->get('name');

        $em = $this->getDoctrine()->getManager();
        $actor = $em->getReference('ActorBundle:Actor', $id);

        $actor->setName($name);

        $em->persist($actor);
        $em->flush();

        return new Response('Actor modificado correctamente', 201);

    }
}
