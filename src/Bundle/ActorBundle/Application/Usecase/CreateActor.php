<?php

namespace Bundle\ActorBundle\Application\Usecase;

use Bundle\ActorBundle\Domain\Event\ActorWasCreated;
use Bundle\ActorBundle\Entity\Actor;
use Bundle\ActorBundle\Infraestructure\Repository\ActorRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateActor
{
    private $actorRepository;
    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->actorRepository = $actorRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute(string $name)
    {

        $actor = new Actor();
        $actor->setName($name);

        $this->actorRepository->saveActor($actor);

        $this->dispatcher->dispatch(ActorWasCreated::TOPIC, new ActorWasCreated($actor));

    }
}