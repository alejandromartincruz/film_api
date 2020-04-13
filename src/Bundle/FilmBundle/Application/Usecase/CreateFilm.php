<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\FilmBundle\Domain\Event\FilmWasCreated;
use Bundle\FilmBundle\Domain\Entity\Film;
use Bundle\FilmBundle\Domain\Interfaces\FilmRepository;
use Bundle\ActorBundle\Domain\Interfaces\ActorRepository;
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

        try {
            $this->filmRepository->save($film);
            $this->dispatcher->dispatch(FilmWasCreated::TOPIC, new FilmWasCreated($film->getId()));
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

    }
}