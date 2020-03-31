<?php

namespace Bundle\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorController extends Controller
{
    public function executeAction(Request $request)
    {
        $id = $request->query->get('id');

        $em = $this->getDoctrine()->getManager();
        $actor = $em->getReference('ActorBundle:Actor', $id);

        $em->remove($actor);
        $em->flush();

        return new Response('Actor borrado correctamente', 201);
    }
}
