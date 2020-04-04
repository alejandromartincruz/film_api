<?php

namespace Bundle\FilmBundle\Infraestructure\http\Controller;

use Bundle\FilmBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmDetailsController extends Controller
{
    public function executeAction($filmId)
    {
        $id = (int) $filmId;

        $film = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findOneById($id);

        return $this->render('FilmBundle:Default:details.html.twig', ['film' => $film] );
    }
}
