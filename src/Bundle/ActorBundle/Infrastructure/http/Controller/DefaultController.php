<?php

namespace Bundle\ActorBundle\Infrastructure\http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ActorBundle:Default:index.html.twig');
    }
}
