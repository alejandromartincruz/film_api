<?php

namespace Bundle\FilmBundle\Entity;

use Bundle\ActorBundle\Entity\Actor;

/**
 * Film
 */
class Film
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
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $actor_id;

    /**
     * @var Actor
     */
    private $actor;

    public function __construct(string $name, string $description, Actor $actor)
    {
        $this->name = $name;
        $this->description = $description;
        $this->actor_id = $actor->getId();
        $this->actor = $actor;
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
     * @return Film
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set actor
     *
     * @param int $actor_id
     *
     * @return Film
     */
    public function setActorId($actor_id)
    {
        $this->actor_id = $actor_id;

        return $this;
    }

    /**
     * Get actor
     *
     * @return int
     */
    public function getActorId()
    {
        return $this->actor_id;
    }
}

