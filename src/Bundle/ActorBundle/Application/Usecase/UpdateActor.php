<?php


namespace Bundle\ActorBundle\Application\Usecase;
use Bundle\ActorBundle\Domain\Event\ActorWasUpdated;
use Bundle\ActorBundle\Domain\Interfaces\ActorRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


class UpdateActor
{
    private $actorRepository;
    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->actorRepository = $actorRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute(int $id, string $name)
    {

        $actor = $this->actorRepository->findOneById($id);

        if (is_null($actor)) {
            return false;
        }

        $actor->setName($name);

        try {
            $this->actorRepository->save($actor);
            $this->dispatcher->dispatch(ActorWasUpdated::TOPIC, new ActorWasUpdated($actor->getId()));
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

    }
}