<?php

namespace Bundle\FilmBundle\Domain\Event;

use Symfony\Component\EventDispatcher\Event;

class FilmWasUpdated extends Event
{

    const TOPIC = "film.updated";

    private $filmId;

    public function __construct(int $filmId)
    {
        $this->filmId = $filmId;
    }

    public function getFilmId(): int
    {
        return $this->filmId;
    }

}