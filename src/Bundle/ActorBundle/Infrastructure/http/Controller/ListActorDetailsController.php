<?php

namespace Bundle\ActorBundle\Infrastructure\http\Controller;

use Bundle\ActorBundle\Domain\Interfaces\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorDetailsController extends Controller
{
    private $actorRepository;

    public function __construct(
       ActorRepository  $actorRepository
    )
    {
        $this->actorRepository = $actorRepository;
    }

    public function executeAction($actorId)
    {
        $id = (int) $actorId;

        $actor = $this->actorRepository->findOneById($id);

        $actor = $actor->toArray($actor);

        return $this->render('ActorBundle:Default:details.html.twig', ['actor' => $actor] );
    }
}
