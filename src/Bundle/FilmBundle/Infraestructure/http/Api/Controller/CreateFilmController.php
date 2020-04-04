<?php

namespace Bundle\FilmBundle\Infraestructure\http\Api\Controller;

use Bundle\FilmBundle\Entity\Film;
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
        $actorId = $json['actorId'];

        $createActorCase = $this->get('app.film.usecase.newfilm');
        $createActorCase->execute($name, $description, $actorId);

        return new Response('Film creado correctamente', 201);
    }
}
