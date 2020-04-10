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
    private $actors;

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
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): ?string
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
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
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
    public function setActorId($actor_id): self
    {
        $this->actor_id = $actor_id;

        return $this;
    }

    /**
     * Get actor
     *
     * @return int
     */
    public function getActorId(): ?int
    {
        return $this->actor_id;
    }

    /**
     * Get actor
     *
     * @return Actor
     */
    public function getActor(): ?Actor
    {
        return $this->actor;
    }

    public function setActor(?Actor $actor): self
    {
        $this->actor = $actor;
        $this->actor_id = $actor->getId();
        return $this;
    }

    public function toArray(Film $film)
    {
        return [
            'id' => $film->getId(),
            'name' => $film->getName(),
            'description' => $film->getDescription(),
            'actor_id' => $film->getActorId()
        ];
    }
}

