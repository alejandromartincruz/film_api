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
