<?php

namespace Bundle\ActorBundle\Domain\Event;

use Bundle\ActorBundle\Domain\Entity\Actor;
use Symfony\Component\EventDispatcher\Event;

class ActorWasDeleted extends Event
{

    const TOPIC = "actor.deleted";

    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

}