<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\ActorBundle\Infraestructure\Repository\ActorRepository;
use Bundle\FilmBundle\Domain\Event\FilmWasUpdated;
use Bundle\FilmBundle\Infraestructure\Repository\FilmRepository;
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

    public function execute(int $id, string $name, string $description, int $actorId)
    {
        $actor = $this->actorRepository->findOneById($actorId);

        $film = $this->filmRepository->findOneById($id);
        $film->setName($name);
        $film->setDescription($description);
        $film->setActor($actor);

        $this->filmRepository->save($film);

        $this->dispatcher->dispatch(FilmWasUpdated::TOPIC, new FilmWasUpdated($film));

    }
}