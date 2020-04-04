<?php

namespace Bundle\ActorBundle\Infraestructure\http\Api\Controller;

use Bundle\ActorBundle\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateActorController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $name = $json['name'];

        if(empty($name)) {
            return new Response('Error: el valor name es incorrecto o esta vacío', 422);
        }

        $createActorCase = $this->get('app.actor.usecase.newactor');
        $createActorCase->execute($name);

        return new Response('Actor creado correctamente', 201);
    }
}
