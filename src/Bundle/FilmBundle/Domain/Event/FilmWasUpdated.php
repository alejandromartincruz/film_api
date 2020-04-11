<?php

namespace Bundle\FilmBundle\Domain\Event;

use Bundle\FilmBundle\Domain\Entity\Film;
use Symfony\Component\EventDispatcher\Event;

class FilmWasUpdated extends Event
{

    const TOPIC = "film.updated";

    private $film;

    public function __construct(Film $film)
    {
        $this->film = $film;
    }

    public function getFilm(): Film
    {
        return $this->film;
    }

}