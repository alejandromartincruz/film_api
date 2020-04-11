<?php


namespace Bundle\ActorBundle\Application\Usecase;


use Bundle\ActorBundle\Domain\Event\ActorWasDeleted;
use Bundle\ActorBundle\Infrastructure\Repository\ActorRepository;

class DeleteActor
{
    private $actorRepository;
    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->actorRepository = $actorRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute(int $id)
    {
        $actor = $this->actorRepository->findOneById($id);

        $this->actorRepository->delete($actor);

        $this->dispatcher->dispatch(ActorWasDeleted::TOPIC, new ActorWasDeleted($actor));
    }
}