<?php

namespace Bundle\FilmBundle\Infraestructure\http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteFilmController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];

        $em = $this->getDoctrine()->getManager();
        $film = $em->getReference('FilmBundle:Film', $id);

        $em->remove($film);
        $em->flush();

        return new Response('Film borrado correctamente', 201);
    }
}
