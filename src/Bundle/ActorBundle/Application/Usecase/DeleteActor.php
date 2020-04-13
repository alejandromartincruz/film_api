<?php


namespace Bundle\ActorBundle\Application\Usecase;


use Bundle\ActorBundle\Domain\Event\ActorWasDeleted;
use Bundle\ActorBundle\Domain\Interfaces\ActorRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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

        if (is_null($actor)) {
            return false;
        }

        try {
            $actorId = $actor->getId();
            $this->actorRepository->delete($actor);
            $this->dispatcher->dispatch(ActorWasDeleted::TOPIC, new ActorWasDeleted($actorId));
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

    }
}