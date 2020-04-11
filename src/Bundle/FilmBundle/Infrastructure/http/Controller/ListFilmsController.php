<?php

namespace Bundle\FilmBundle\Infrastructure\http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmsController extends Controller
{
    public function executeAction()
    {
        $readFilmCase = $this->get('app.film.usecase.readfilm');
        $films = $readFilmCase->execute();

        return $this->render('FilmBundle:Default:list.html.twig', ['films' => $films] );
    }
}