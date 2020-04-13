<?php

namespace Bundle\ActorBundle\Infrastructure\http\Api\Controller;

use Bundle\ActorBundle\Application\Usecase\UpdateActor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateActorController extends Controller
{
    private $updateActorCase;

    public function __construct(
        UpdateActor $updateActorCase
    )
    {
        $this->updateActorCase = $updateActorCase;
    }

    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];
        $name = $json['name'];

        $this->updateActorCase->execute($id, $name);

        return new Response('Actor modificado correctamente', 201);

    }
}
