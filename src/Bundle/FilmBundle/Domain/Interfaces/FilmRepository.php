<?php


namespace Bundle\FilmBundle\Domain\Interfaces;

use Bundle\FilmBundle\Domain\Entity\Film;

interface FilmRepository
{
    public function findAllOrderedByName();
    public function findOneById(int $id): Film;
    public function save(Film $film): void;
    public function delete(Film $film): void;
}