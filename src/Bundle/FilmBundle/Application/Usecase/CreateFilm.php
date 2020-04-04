<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\ActorBundle\Infraestructure\Repository\ActorRepository;
use Bundle\FilmBundle\Domain\Event\FilmWasCreated;
use Bundle\FilmBundle\Entity\Film;
use Bundle\FilmBundle\Infraestructure\Repository\FilmRepository;
use Doctrine\ORM\EntityManager;
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

    public function execute(string $name, string $description, int $actorId)
    {
        $actor = $this->actorRepository->findOneById($actorId);

        $film = new Film();
        $film->setName($name);
        $film->setDescription($description);
        $film->setActor($actor);

        $this->filmRepository->saveFilm($film);

        $this->dispatcher->dispatch(FilmWasCreated::TOPIC, new FilmWasCreated($film));

    }
}