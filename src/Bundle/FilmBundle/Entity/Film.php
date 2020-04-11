<?php

namespace Bundle\FilmBundle\Entity;

use Bundle\ActorBundle\Entity\Actor;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @var ArrayCollection
     */
    private $actors;

    /**
     * Film constructor.
     */
    public function __construct()
    {
        $this->actors = new ArrayCollection();
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
     * Get actors
     *
     * @return Collection|Actor[]
     */
    public function getActors(): Collection
    {
        return $this->actors;
    }
    public function addActor(Actor $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors[] = $actor;
            $actor->addFilm($this);
        }
        return $this;
    }
    public function removeActor(Actor $actor): self
    {
        if ($this->actors->contains($actor)) {
            $this->actors->removeElement($actor);
            $actor->removeFilm($this);
        }
        return $this;
    }

    public function toArray(Film $film)
    {
        $actorsCollection = $film->getActors();
        $actors = [];
        foreach ($actorsCollection as $actor) {
            $actors[$actor->getId()] = $actor->getName();
        }

        return [
            'id'          => $film->getId(),
            'name'        => $film->getName(),
            'description' => $film->getDescription(),
            'actors'      => $actors
        ];
    }
}

