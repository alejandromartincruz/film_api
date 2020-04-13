<?php

namespace Bundle\ActorBundle\Domain\Event;

use Symfony\Component\EventDispatcher\Event;

class ActorWasCreated extends Event
{

    const TOPIC = "actor.created";

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