<?php

namespace Bundle\ActorBundle\Infrastructure\http\Controller;


use Bundle\ActorBundle\Application\Usecase\ReadActor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorsController extends Controller
{
    private $readActorCase;

    public function __construct(
        ReadActor $readActorCase
    )
    {
        $this->readActorCase = $readActorCase;
    }

    public function executeAction()
    {
        $actors = $this->readActorCase->execute();

        return $this->render('ActorBundle:Default:list.html.twig', ['actors' => $actors] );
    }
}
