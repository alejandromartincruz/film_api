<?php

namespace Bundle\FilmBundle\Infraestructure\http\Api\Controller;

use Bundle\FilmBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListFilmsController extends Controller
{
    public function executeAction()
    {
        $films = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findAllOrderedByName();

        $filmsAsArray = array_map(function (Film $f) {
            return $f->toArray($f);
        }, $films);

        return new JsonResponse($filmsAsArray);
    }
}
