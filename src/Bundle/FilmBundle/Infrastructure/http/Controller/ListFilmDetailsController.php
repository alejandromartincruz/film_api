<?php

namespace Bundle\FilmBundle\Infrastructure\http\Controller;

use Bundle\FilmBundle\Domain\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmDetailsController extends Controller
{
    public function executeAction($filmId)
    {
        $id = (int) $filmId;

        $filmRepository = $this->get('app.film.repository.cached');
        $film = $filmRepository->findOneById($id);

        $film = $film->toArray($film);

        return $this->render('FilmBundle:Default:details.html.twig', ['film' => $film] );
    }
}
