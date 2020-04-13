<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\FilmBundle\Domain\Event\FilmWasUpdated;
use Bundle\FilmBundle\Domain\Interfaces\FilmRepository;
use Bundle\ActorBundle\Domain\Interfaces\ActorRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateFilm
{
    private $filmRepository;
    private $actorRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->filmRepository = $filmRepository;
        $this->actorRepository = $actorRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute(int $id, string $name, string $description, array $actorIdArray)
    {

        $film = $this->filmRepository->findOneById($id);
        $film->setName($name);
        $film->setDescription($description);

        foreach ($actorIdArray as $actorId) {
            $actor = $this->actorRepository->findOneById($actorId);
            $film->addActor($actor);
        }

        try {
            $this->filmRepository->save($film);
            $this->dispatcher->dispatch(FilmWasUpdated::TOPIC, new FilmWasUpdated($film->getId()));
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

    }
}