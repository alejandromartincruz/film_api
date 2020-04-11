<?php

namespace Bundle\FilmBundle\Infrastructure\http\Api\Controller;

use Bundle\FilmBundle\Domain\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListFilmsController extends Controller
{
    public function executeAction()
    {
        $readFilmCase = $this->get('app.film.usecase.readfilm');
        $films = $readFilmCase->execute();

        $filmsAsArray = array_map(function (Film $f) {
            return $f->toArray($f);
        }, $films);

        return new JsonResponse($filmsAsArray);
    }
}
