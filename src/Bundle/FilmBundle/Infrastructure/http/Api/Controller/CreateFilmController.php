<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateFilmController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $name = $json['name'];
        $description = $json['description'];
        $actorIdArray = $json['actorIdArray'];

        $createActorCase = $this->get('app.film.usecase.newfilm');
        $createActorCase->execute($name, $description, $actorIdArray);

        return new Response('Film creado correctamente', 201);
    }
}
