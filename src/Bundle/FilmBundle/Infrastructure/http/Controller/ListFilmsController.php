<?php

namespace Bundle\FilmBundle\Infrastructure\http\Controller;

use Bundle\FilmBundle\Application\Usecase\ReadFilm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        return $this->render('FilmBundle:Default:list.html.twig', ['films' => $films] );
    }
}
