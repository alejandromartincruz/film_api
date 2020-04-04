<?php

namespace Bundle\FilmBundle\Infraestructure\http\Api\Controller;

use Bundle\FilmBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateFilmController extends Controller
{
    public function executeAction(Request $request)
    {
        $json_string = utf8_encode($request->getContent());
        $json = json_decode( $json_string, true );

        $name = $json['name'];
        $description = $json['description'];
        $actorId = $json['actorId'];

        /*
        $actor = $this->getDoctrine()->getRepository('\Bundle\ActorBundle\Entity\Actor')->findOneBy(['id' => $actorId]);

        $film = new Film();

        $film->setName($name);
        $film->setDescription($description);
        $film->setActor($actor);


        $em = $this->getDoctrine()->getManager();

        $em->persist($film);
        $em->flush();
        */
        $createActorCase = $this->get('app.film.usecase.newfilm');
        $createActorCase->execute($name, $description, $actorId);

        return new Response('Film creado correctamente', 201);
    }
}
