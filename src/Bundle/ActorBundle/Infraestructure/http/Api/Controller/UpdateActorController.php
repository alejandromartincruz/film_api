<?php

namespace Bundle\ActorBundle\Infraestructure\http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateActorController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];
        $name = $json['name'];

        $em = $this->getDoctrine()->getManager();
        $actor = $em->getReference('ActorBundle:Actor', $id);

        $actor->setName($name);

        $em->persist($actor);
        $em->flush();

        return new Response('Actor modificado correctamente', 201);

    }
}
