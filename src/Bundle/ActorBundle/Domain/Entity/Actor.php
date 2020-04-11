<?php

namespace Bundle\ActorBundle\Domain\Entity;

use Bundle\FilmBundle\Domain\Entity\Film;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @var ArrayCollection
     */
    private $films;

    /**
     * Actor constructor.
     */
    public function __construct()
    {
        $this->films = new ArrayCollection();
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
     * Get films
     *
     * @return Collection|Film[]
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }
    public function addFilm(Film $film): self
    {
        if (!$this->films->contains($film)) {
            $this->films[] = $film;
            $film->addActor($this);
        }
        return $this;
    }
    public function removeFilm(Film $film): self
    {
        if ($this->films->contains($film)) {
            $this->films->removeElement($film);
            $film->removeActor($this);
        }
        return $this;
    }

    public function toArray(Actor $actor)
    {
        $filmsCollection = $actor->getFilms();
        $films = [];

        foreach ($filmsCollection as $film) {
            $films[$film->getId()]['name'] = $film->getName();
            $films[$film->getId()]['description'] = $film->getDescription();
        }

        return [
            'id'    => $actor->getId(),
            'name'  => $actor->getName(),
            'films' => $films
        ];
    }
}

