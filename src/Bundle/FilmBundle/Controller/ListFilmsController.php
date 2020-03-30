<?php

namespace Bundle\FilmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListFilmsController extends Controller
{
    public function executeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('\Bundle\FilmBundle\Entity\Film')->findAll();

        return $this->render('FilmBundle:Default:list.html.twig', ['films' => $films] );
    }
}
