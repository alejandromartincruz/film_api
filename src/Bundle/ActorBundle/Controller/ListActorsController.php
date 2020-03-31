<?php

namespace Bundle\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorsController extends Controller
{
    public function executeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actors = $em->getRepository('\Bundle\ActorBundle\Entity\Actor')->findAll();

        return $this->render('ActorBundle:Default:list.html.twig', ['actors' => $actors] );
    }
}
