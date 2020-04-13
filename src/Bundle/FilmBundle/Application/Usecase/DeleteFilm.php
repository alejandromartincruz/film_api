<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\FilmBundle\Domain\Event\FilmWasDeleted;
use Bundle\FilmBundle\Domain\Interfaces\FilmRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DeleteFilm
{
    private $filmRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, EventDispatcherInterface $dispatcher)
    {
        $this->filmRepository = $filmRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute(int $id)
    {
        $film = $this->filmRepository->findOneById($id);

        if (is_null($film)) {
            return false;
        }

        try {
            $filmId = $film->getId();
            $this->filmRepository->delete($film);
            $this->dispatcher->dispatch(FilmWasDeleted::TOPIC, new FilmWasDeleted($filmId));
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
}