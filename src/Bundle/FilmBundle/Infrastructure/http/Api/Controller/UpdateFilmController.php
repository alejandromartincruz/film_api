<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

use Bundle\FilmBundle\Application\Usecase\UpdateFilm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateFilmController extends Controller
{
    private $updateFilmCase;

    public function __construct(
        UpdateFilm $updateFilmCase
    )
    {
        $this->updateFilmCase = $updateFilmCase;
    }

    public function executeAction(Request $request)
    {
        $json_string = $request->getContent();
        $json = json_decode( $json_string, true );

        $id = $json['id'];
        $name = $json['name'];
        $description = $json['description'];
        $actorIdArray = $json['actorIdArray'];

        $this->updateFilmCase->execute($id, $name, $description, $actorIdArray);

        return new Response('Film modificado correctamente', 201);

    }
}
