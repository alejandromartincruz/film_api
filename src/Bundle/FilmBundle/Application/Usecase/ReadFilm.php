<?php

namespace Bundle\FilmBundle\Application\Usecase;

use Bundle\FilmBundle\Domain\Interfaces\FilmRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ReadFilm
{
    private $filmRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, EventDispatcherInterface $dispatcher)
    {
        $this->filmRepository = $filmRepository;
        $this->dispatcher = $dispatcher;
    }

    public function execute()
    {
        $films = $this->filmRepository->findAllOrderedByName();

        return $films;
    }
}