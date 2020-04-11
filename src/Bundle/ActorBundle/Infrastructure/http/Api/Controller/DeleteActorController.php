<?php

namespace Bundle\ActorBundle\Infrastructure\http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];

        $em = $this->getDoctrine()->getManager();
        $actor = $em->getReference('ActorBundle:Actor', $id);

        $em->remove($actor);
        $em->flush();

        return new Response('Actor borrado correctamente', 201);
    }
}
