<?php

namespace Bundle\FilmBundle\Infraestructure\http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FilmBundle:Default:index.html.twig');
    }
}
