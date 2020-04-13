<?php

namespace Bundle\ActorBundle\Infrastructure\http\Api\Controller;

use Bundle\ActorBundle\Application\Usecase\DeleteActor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorController extends Controller
{
    private $deleteActorCase;

    public function __construct(
        DeleteActor $deleteActorCase
    )
    {
        $this->deleteActorCase = $deleteActorCase;
    }

    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $id = $json['id'];

        $this->deleteActorCase->execute($id);

        return new Response('Actor borrado correctamente', 201);
    }
}
