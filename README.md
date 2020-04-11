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
* Create: una acción POST en la ruta `/api/film/` hay que añadirle un json. Por ejemplo: { "name": "Matriz Reloaded", "description": "primera descripción", "actorId": "3" }
* Read: una acción GET en la ruta `/api/film/` Devuelve un array de objetos json con las peliculas
* Update: una acción PUT en la ruta `/api/film/` hay que añadirle un json. Por ejemplo: { "id": "1", "name": "Matrix Reloaded", "description": "descripción nueva", "actorId": "4" }
* Delete: una acción DELETE en la ruta `/api/film/` hay que añadirle un json. Por ejemplo: { "id": "1" }

> La API HTTP para los Actor debe pemitir, como mínimo, las operaciones CRD.

Actor tiene el CRUD realizado:
* Create: una acción POST en la ruta `/api/actor/` hay que añadirle un json. Por ejemplo: { "name": "H.J. Simpson" }
* Read: una acción GET en la ruta `/api/actor/` Devuelve un array de objetos json con los actores
* Update: una acción PUT en la ruta `/api/actor/` hay que añadirle un json. Por ejemplo: { "id": "1", "name": "Max Power" }
* Delete: una acción DELETE en la ruta `/api/actor/` hay que añadirle un json. Por ejemplo: { "id": "1" }

> Además, se ofrecerán dos páginas de interfaz de usuario, una para la lectura de las propiedades de un Film en concreto y otra para la lectura de las propiedades de un Actor en concreto.

Desde la página de inicio / hay dos enlaces, uno para un listado de peliculas y otro con un listado de actores.

la ruta `/film/list/` accesible desde navegador ofrece un listado con las peliculas y cada pelicula con un enlace, desde cada uno de los
enlaces de las peliculas se tiene acceso a una página de lectura de las propiedades del Film. La página esta en la ruta:

    /film/list/{filmId}/

la ruta `/actor/list/` accesible desde navegador ofrece un listado con los actores y cada actor con un enlace, desde cada uno de los
enlaces de los actores se tiene acceso a una página de lectura de las propiedades del Actor. La página esta en la ruta:

    /actor/list/{actorId}/
    
>  Los textos dinámicos (nombre, descripción, etc.) no deben estar internacionalizados, sólo las etiquetas. Por ejemplo: Nombre/Name: National Treasure. 

Los textos dinámicos y algunos de los títulos de las páginas estan internacionalizados. Como se puede ver en las plantillas,
estan puestas las etiquetas en ingles, y como se ha configurado el idioma predeterminado al español, por lo que, al no 
indicar ningún idioma lo que se muestra en la web es español. Si indicaramos que el idioma es inglés, los textos se mostrarían en inglés.

> Además, se deberá permitir realizar todas las operaciones CRUD de Film por consola mediante operaciones por la consola (bin/console) de Symfony. 

* `php bin/console app:create-film {titulo} "{descripción}" {actor_id}` crea una pelicula con los argumentos especificados (si titulo o descripción tienen más de una palabra han de ir entre comillas dobles)
* `php bin/console app:read-film` devuelve un listado con las peliculas.
* `php bin/console app:update-film {id} {titulo} "{descripción}" {actor_id}` edita la pelicula con la id indicada, el resto de argumentos funcionan igual que en pelicula nueva.
* `php bin/console app:delete-film {id}` borra la pelicula a la que pertenece el id indicado en el argumento.

> Deberás aplicar arquitectura hexagonal y buenas prácticas de diseño en la medida de lo posible.

Se han aplicado las estructuras de la arquitectura hexagonal todo lo que ha sido posible. Creo que se ha logrado bastante bien, exceptuando la carpeta Entity y su contenido y la carpeta Resource y su contenido.

Al mover la carpeta Entity dentro de Infrastructure todo parecia funcionar bien, pero me daba muchos problemas con el EntityManager que por defecto va a buscar las entidades a la carpeta del Bundle Entity. Moverlo de carpeta da bastantes problemas.

Y algo parecido a lo de la carpeta Entity me ha pasado con Resource, motivo por el que finalmente he decidido dejar tanto Entity como Resource en sus posiciones iniciales para evitar problemas.

> Es obligatorio usar eventos, te pueden ser muy útiles para algunas funcionalidades de la caché. 

Se han generado eventos, los eventos son los siguientes:

* film.created
* film.updated
* film.deleted
* actor.created


Importante: crear proyecto con estructura adecuada
========================

`composer create-project symfony/framework-standard-edition` -> genera symfony version 3.4.38

Si no se genera el proyecto desde este comando luego faltan carpetas y salen errores al intentar realizar cosas nuevas como por ejemplo los bundles.

Despues de crear un bundle nuevo hay que ejecutar el siguiente comando en linea de comandos:

`composer dump-autoload`

De no hacerlo sale un error de namespaces diciendo que no se ha hecho un use del namespace en alguna parte aunque todo el código parece correcto.

Dentro de app/config/cnofig.yml hay que añadir en el tag de framework: de manera que quede asi
```yaml
framework:
    templating:
        engines: ['twig']
```
De no hacerlo, no reconoce los templates añadidos en los bundles y sale un error diciendo que no encuentra los templates en rutas que no son los bundles a pesar de que los controladores de los unbles apuntan a la carpeta de templates del bundle.
