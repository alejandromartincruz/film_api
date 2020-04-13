<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

use Bundle\FilmBundle\Application\Usecase\CreateFilm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateFilmController extends Controller
{
    private $createFilmCase;

    public function __construct(
        CreateFilm $createFilmCase
    )
    {
        $this->createFilmCase = $createFilmCase;
    }

    public function executeAction(Request $request)
    {
        $json_string = $request->getContent();
        $json = json_decode( $json_string, true );

        $name = $json['name'];
        $description = $json['description'];
        $actorIdArray = $json['actorIdArray'];

        $this->createFilmCase->execute($name, $description, $actorIdArray);

        return new Response('Film creado correctamente', 201);
    }
}
