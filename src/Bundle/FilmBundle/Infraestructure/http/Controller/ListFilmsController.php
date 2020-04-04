<?php

namespace Bundle\FilmBundle\Infraestructure\http\Controller;

use Bundle\FilmBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmsController extends Controller
{
    public function executeAction()
    {
        $films = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findAllOrderedByName();

        return $this->render('FilmBundle:Default:list.html.twig', ['films' => $films] );
    }
}
