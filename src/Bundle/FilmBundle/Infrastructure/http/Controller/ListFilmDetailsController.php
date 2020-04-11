<?php

namespace Bundle\FilmBundle\Infrastructure\http\Controller;

use Bundle\FilmBundle\Domain\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmDetailsController extends Controller
{
    public function executeAction($filmId)
    {
        $id = (int) $filmId;

        $film = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findOneById($id);

        $film = $film->toArray($film);

        return $this->render('FilmBundle:Default:details.html.twig', ['film' => $film] );
    }
}
