Notas proyecto entrega 3: film api
========================

Del enunciado de la entrega leemos lo siguiente:

>"Las dos entidades principales serán Film y Actor."

Por lo que se han creado dos entidades, una para film y otra para actor.

El enunciado tambien dice la estructura de las entidades y su relación:

>"Un Film tendrá las propiedades name y description y se relacionará con un Actor, que tendrá la propiedad name."

Yo entiendo que Film tiene solo las propiedades name y description, y actor unicamente tiene la propiedad name.

Además, cuando dice que cada Film se relaciona con UN actor, entiendo que es una relación manyToOne. Mientras que de la 
relación inversa no se dice nada, y por poder poner el mismo Actor en diversas películas he establecido una relación oneToMany.

>"La API HTTP debe permitir, para los Film: todas las operaciones CRUD"

Film tiene el CRUD realizado:
* Create: una acción POST en la ruta /film/ hay que poner en la query un name, un description y un actorId. Por ejemplo: ?name=Matriz&description=primera%20descripción&actorId=3
* Read: en la ruta /film/list/ accesible desde navegador y que ofrece un link a página con detalles de cada pelicula.
* Update: una acción PUT en la ruta /film/ hay que poner en la query un id, un name, un description y un actorId. Por ejemplo ?id=1&name=Matrix&description=una%20descripcion%20diferente&actorId=4
* Delete: una acción DELETE en la ruta /film/ hay que poner en la query un id. Por ejemplo ?id=1

> La API HTTP para los Actor debe pemitir, como mínimo, las operaciones CRD.

Actor tiene el CRUD realizado:
* Create: una acción POST en la ruta /actor/ hay que poner en la query un name. Por ejemplo: ?name=Arnold
* Read: en la ruta /actor/list/ accesible desde navegador y que ofrece un link a página con detalles de cada actor.
* Update: una acción PUT en la ruta /actor/ hay que poner en la query un id y un name. Por ejemplo ?id=1&name=Arnold%20Schwarzenegger
* Delete: una acción DELETE en la ruta /actor/ hay que poner en la query un id. Por ejemplo ?id=1

> Además, se ofrecerán dos páginas de interfaz de usuario, una para la lectura de las propiedades de un Film en concreto y otra para la lectura de las propiedades de un Actor en concreto.

Desde la página de inicio / hay dos enlaces, uno para un listado de peliculas y otro con un listado de actores.

Film tiene una página de interfaz de usuario con el listado completo de peliculas descrito antes, desde cada una de las
peliculas se tiene acceso a una página de lectura de las propiedades del Film. La pagina esta en la ruta:

    /film/list/{filmId}/

Actor también tiene la página de listado de actores, cada actor con un enlace a una página con los detalles del actor. La página esta en la ruuta:

    /actor/list/{actorId}/
    
>  Los textos dinámicos (nombre, descripción, etc.) no deben estar internacionalizados, sólo las etiquetas. Por ejemplo: Nombre/Name: National Treasure. 

Los textos dinámicos y algunos de los títulos de las páginas estan internacionalizados. Como se puede ver en las plantillas,
estan puestas las etiquetas en ingles, y como se ha configurado el idioma predeterminado al español, por lo que, al no 
indicar ningún idioma lo que se muestra en la web es español. Si indicaramos que el idioma es inglés, los textos se mostrarían en inglés.


Importante: crear proyecto con estructura adecuada
========================

composer create-project symfony/framework-standard-edition -> genera symfony version 3.4.38

Si no se genera el proyecto desde este comando luego faltan carpetas y salen errores al intentar hacer muchas cosas.

Despues de crear un bundle nuevo hay que ejecutar el siguiente comando en linea de comandos:
**composer dump-autoload**
De no hacerlo sale un error de namespaces diciendo que no se ha hecho un use del namespace en alguna parte aunque todo el código parece correcto.

Dentro de app/config/cnofig.yml hay que añadir en el tag de framework: de manera que quede asi
framework:
    templating:
        engines: ['twig']
De no hacerlo, no reconoce los templates añadidos en los bundles y sale un error diciendo que no encuentra los templates en rutas que no son los bundles a pesar de que los controladores de los unbles apuntan a la carpeta de templates del bundle.



Symfony Standard Edition
========================

**WARNING**: This distribution does not support Symfony 4. See the
[Installing & Setting up the Symfony Framework][15] page to find a replacement
that fits you best.

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev env) - Adds code generation
    capabilities

  * [**WebServerBundle**][14] (in dev env) - Adds commands for running applications
    using the PHP built-in web server

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.4/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.4/doctrine.html
[8]:  https://symfony.com/doc/3.4/templating.html
[9]:  https://symfony.com/doc/3.4/security.html
[10]: https://symfony.com/doc/3.4/email.html
[11]: https://symfony.com/doc/3.4/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/current/setup.html
