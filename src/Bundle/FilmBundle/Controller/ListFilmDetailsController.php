<?php

namespace Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmDetailsController extends Controller
{
    public function executeAction($filmId)
    {
        $id = (int) $filmId;

        $em = $this->getDoctrine()->getManager();
        $film = $em->getReference('FilmBundle:Film', $id);
        return $this->render('FilmBundle:Default:details.html.twig', ['film' => $film] );
    }
}
