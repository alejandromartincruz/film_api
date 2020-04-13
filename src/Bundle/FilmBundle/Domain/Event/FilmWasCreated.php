<?php

namespace Bundle\FilmBundle\Domain\Event;

use Symfony\Component\EventDispatcher\Event;

class FilmWasCreated extends Event
{

    const TOPIC = "film.created";

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