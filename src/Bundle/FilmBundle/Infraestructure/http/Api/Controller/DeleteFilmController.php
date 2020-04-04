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

        $deleteActorCase = $this->get('app.film.usecase.deletefilm');
        $deleteActorCase->execute($id);

        return new Response('Film borrado correctamente', 201);
    }
}
