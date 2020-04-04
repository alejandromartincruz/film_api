<?php

namespace Bundle\ActorBundle\Domain\Event;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Component\EventDispatcher\Event;

class ActorWasCreated extends Event
{

    const TOPIC = "actor.created";

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