<?php

namespace Bundle\FilmBundle\Infraestructure\http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateFilmController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];
        $name = $json['name'];
        $description = $json['description'];
        $actorId = $json['actorId'];

        $em = $this->getDoctrine()->getManager();
        $film = $em->getReference('FilmBundle:Film', $id);

        $film->setName($name);
        $film->setDescription($description);
        $film->setActorId($actorId);

        $em->persist($film);
        $em->flush();

        return new Response('Film modificado correctamente', 201);

    }
}
