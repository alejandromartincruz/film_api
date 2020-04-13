<?php

namespace Bundle\FilmBundle\Infrastructure\http\Controller;


use Bundle\FilmBundle\Domain\Interfaces\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmDetailsController extends Controller
{
    private $filmRepository;

    public function __construct(
        FilmRepository $filmRepository
    )
    {
        $this->filmRepository = $filmRepository;
    }

    public function executeAction($filmId)
    {
        $id = (int) $filmId;

        $film = $this->filmRepository->findOneById($id);

        $film = $film->toArray($film);

        return $this->render('FilmBundle:Default:details.html.twig', ['film' => $film] );
    }
}
