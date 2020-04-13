<?php


namespace Bundle\ActorBundle\Application\Usecase;
use Bundle\ActorBundle\Domain\Interfaces\ActorRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


class ReadActor
{
    private $actorRepository;
    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->actorRepository = $actorRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute()
    {
        $actors = $this->actorRepository->findAllOrderedByName();

        return $actors;
    }
}