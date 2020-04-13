<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

use Bundle\FilmBundle\Application\Usecase\DeleteFilm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteFilmController extends Controller
{
    private $deleteFilmCase;

    public function __construct(
        DeleteFilm $deleteFilmCase
    )
    {
        $this->deleteFilmCase = $deleteFilmCase;
    }

    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];

        $this->deleteFilmCase->execute($id);

        return new Response('Film borrado correctamente', 201);
    }
}
