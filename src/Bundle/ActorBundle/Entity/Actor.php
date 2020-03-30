<?php

namespace Bundle\ActorBundle\Entity;

use Bundle\FilmBundle\Entity\Film;

/**
 * Actor
 */
class Actor
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Film
     */
    private $film;

    /**
     * Actor constructor.
     * @param $name
     */
    public function __construct($name, Film $film)
    {
        $this->name = $name;
        $this->film = $film;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Actor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

