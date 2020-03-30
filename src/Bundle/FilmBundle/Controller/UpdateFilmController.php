<?php

namespace Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateFilmController extends Controller
{
    public function executeAction(Request $request)
    {
        $id = $request->query->get('id');
        $name = $request->query->get('name');
        $description = $request->query->get('description');
        $actorId = $request->query->get('actorId');

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
