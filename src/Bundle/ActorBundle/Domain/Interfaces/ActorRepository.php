<?php


namespace Bundle\ActorBundle\Domain\Interfaces;

use Bundle\ActorBundle\Domain\Entity\Actor;

interface ActorRepository
{
    public function findAllOrderedByName();
    public function findOneById(int $id): ?Actor;
    public function save(Actor $actor): void;
    public function delete(Actor $actor): void;
}