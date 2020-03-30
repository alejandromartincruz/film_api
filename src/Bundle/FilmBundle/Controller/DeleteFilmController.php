<?php

namespace Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteFilmController extends Controller
{
    public function executeAction(Request $request)
    {
        $id = $request->query->get('id');

        $em = $this->getDoctrine()->getManager();
        $film = $em->getReference('FilmBundle:Film', $id);

        $em->remove($film);
        $em->flush();

        return new Response('Film borrado correctamente', 201);
    }
}
