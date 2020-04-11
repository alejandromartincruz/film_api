<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

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
        $actorIdArray = $json['actorIdArray'];

        $updateActorCase = $this->get('app.film.usecase.updatefilm');
        $updateActorCase->execute($id, $name, $description, $actorIdArray);

        return new Response('Film modificado correctamente', 201);

    }
}
