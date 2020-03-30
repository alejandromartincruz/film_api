<?php

namespace Bundle\FilmBundle\Controller;

use Bundle\FilmBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateFilmController extends Controller
{
    public function executeAction(Request $request)
    {

        $name = $request->query->get('name');
        $description = $request->query->get('description');
        $actorId = $request->query->get('actorId');

        $actor = $this->getDoctrine()->getRepository('\Bundle\ActorBundle\Entity\Actor')->findOneBy(['id' => $actorId]);

        $film = new Film($name, $description, $actor);

        $em = $this->getDoctrine()->getManager();

        $em->persist($film);
        $em->flush();

        return new Response('Film creado correctamente', 201);
    }
}
