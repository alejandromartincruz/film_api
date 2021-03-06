<?php

namespace Bundle\ActorBundle\Domain\Event;

use Symfony\Component\EventDispatcher\Event;

class ActorWasDeleted extends Event
{

    const TOPIC = "actor.deleted";

    private $actorId;

    public function __construct(int $actorId)
    {
        $this->actorId = $actorId;
    }

    public function getActorId(): int
    {
        return $this->actorId;
    }

}