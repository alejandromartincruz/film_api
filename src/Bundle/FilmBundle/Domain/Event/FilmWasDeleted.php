<?php

namespace Bundle\FilmBundle\Domain\Event;

use Bundle\FilmBundle\Entity\Film;
use Symfony\Component\EventDispatcher\Event;

class FilmWasDeleted extends Event
{

    const TOPIC = "film.deleted";

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