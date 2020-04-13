<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

use Bundle\FilmBundle\Application\Usecase\ReadFilm;
use Bundle\FilmBundle\Domain\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListFilmsController extends Controller
{
    private $readFilmCase;

    public function __construct(
        ReadFilm $readFilmCase
    )
    {
        $this->readFilmCase = $readFilmCase;
    }

    public function executeAction()
    {
        $films = $this->readFilmCase->execute();

        $filmsAsArray = array_map(function (Film $f) {
            return $f->toArray($f);
        }, $films);

        return new JsonResponse($filmsAsArray);
    }
}
