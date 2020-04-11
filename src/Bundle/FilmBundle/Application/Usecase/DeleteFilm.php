<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\FilmBundle\Domain\Event\FilmWasDeleted;
use Bundle\FilmBundle\Infrastructure\Repository\FilmRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DeleteFilm
{
    private $filmRepository;
    private $actorRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, EventDispatcherInterface $dispatcher)
    {
        $this->filmRepository = $filmRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute(int $id)
    {
        $film = $this->filmRepository->findOneById($id);

        $this->filmRepository->delete($film);

        $this->dispatcher->dispatch(FilmWasDeleted::TOPIC, new FilmWasDeleted($film));
    }
}