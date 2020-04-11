<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\ActorBundle\Infrastructure\Repository\ActorRepository;
use Bundle\FilmBundle\Domain\Event\FilmWasCreated;
use Bundle\FilmBundle\Entity\Film;
use Bundle\FilmBundle\Infrastructure\Repository\FilmRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateFilm
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

    public function execute(string $name, string $description, array $actorIdArray)
    {

        $film = new Film();
        $film->setName($name);
        $film->setDescription($description);
        foreach ($actorIdArray as $actorId) {
            $actor = $this->actorRepository->findOneById($actorId);
            $film->addActor($actor);
        }

        $this->filmRepository->save($film);

        $this->dispatcher->dispatch(FilmWasCreated::TOPIC, new FilmWasCreated($film));

    }
}