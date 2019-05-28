1) En base a las siguientes 3 tablas realizar las siguientes consultas:
1.1) Seleccionar todas las compras con sus detalles asociados.

R: Compra::with('detalles')->get();

1.2) Seleccionar el precio total de las compras ordenado por categoría.
R: en el modelo Compra
public function getTotalAttribute()
{
    return $this->detalles()->sum('precio');
}

la consulta queda asi:
Compra::with('detalles.categoria')
    ->get()
    ->sortBy('detalles.categoria.nombre');

2) Explica la diferencia entre Composición y Herencia, incluyendo ejemplos de cuándo es más apropiado usar una o la otra.
R: la herencia se relaciona en una forma 1:1. Esto evidentemente es provocado por la relación “es un”, donde un subtipo 
“contiene” un y sólo un subtipo, entre comillas porque no lo contiene realmente, es él mismo “per se” es padre e hijo al 
mismo tiempo. Sin embargo, haciendo uso de composición podemos elegir si vamos a tener 0, 1 o N elementos con los que 
interactuar del mismo tipo. Esto es muy versátil en tiempo de ejecución incluso, ya que podemos hacer que un objeto que 
tenía un rol deje de tenerlo.

Cuando la herencia tiene sentido?
Si tenemos dos clases directamente relacionadas que están basadas una en la otra y pertenecen al mismo dominio lógico, y estás seguro de que no van a cruzar fronteras no deseadas (por ejemplo ni ellas ni ninguna extensión saldrá del paquete), puedes optar por una relación de herencia.
Si la subclase es y será siempre algo basado en la superclase y además la implementación de la superclase es apropiada e incluso necesaria para la subclase , puedes aplicar herencia sin miedo a equivocarte.
Si además de lo que acabas de leer, la subclase es candidata a sólo añadir nueva funcionalidad y no a sobrescribir nada, sigues por el buen camino y la herencia es bienvenida.

En la composición, delegamos responsabilidades en colaboradores designados para ello

3) Describe en detalle cómo Laravel usa el patrón de diseño MVC
R: Laravel NO es un framework MVC.
De hecho si bien Laravel 4 incluía las 3 famosas carpetas controllers, models, views, en Laravel 5:

Ya no encontrarás una carpeta “models”, en vez de eso tienes una carpeta app/ donde puedes estructurar tu aplicación de la forma que tenga más sentido para el proyecto.
La carpeta Controllers es una pequeña parte de la capa “Http” que se encuentra dentro de app/. Junto a Controllers, tienes Middleware/ (middleware no se pluraliza), tienes el directorio Requests/ donde se albergan los FormRequests y tienes el archivo “routes.php”
La carpeta “views/” se encuentra ahora dentro de resources/ y forma parte de los “recursos” para presentarle los datos al usuario (assets/ lang/).
En la carpeta app/ también encontrarás otras capas como Eventos, Listeners, Excepciones, Jobs, etc.

Laravel está escrito usando todo el poder de la programación orientada a objetos en PHP, así que para dominar Laravel más que “MVC” es importante dominar conceptos, principios y el paradigma de la programación orientada a objetos como tal

4) Utilizando Laravel, se requiere crear las rutas para un sistema que muestra películas de distinto género. Con la base /pelicula/, crea una ruta que dirija a una acción por cada género (entregado como parámetro) en el controlador. Los géneros válidos son Drama, Comedia, Acción y Terror. Cualquier otro género debe devolver error 404.
R: Route::get('/pelicula/{genero}, 'PeliculaController@mostrar');
/*Controlador PeliculaController*/
public function mostrar($genero)
{
    $generoAceptado = [
        'Drama',
        'Comedia',
        'Acción',
        'Terror'
    ];

    if (! in_array($genero, $generoAceptado)) {
        abort(404);
    }
    //todo: accion a realizar
}

5) Cuáles son las ventajas y desventajas de usar el patrón de diseño Active Record en la capa de Modelo?
R: Ventajas: Evita la duplicación de código, Centraliza el acceso a base de datos.
Desventajas: Los objetos se encuentran fuertemente acoplados a la base de datos, por lo que un cambio en el esquema tiene que traducirse obligatoriamente en un cambio en el objeto asociado y viceversa, Es complicado realizar pruebas unitarias sin recurrir a una base de datos o a realizar mocks de la misma.

6) Comandos necesarios para crear un controlador en Laravel, como correr un seeder en PHP, que diferencia existe en el objeto extraído con el método find o All.
R:
php artisan make:controller NameController

php artisan db:seed

el metodo find() trae un solo objeto, este objeto tiene todo lo que tiene la tabla
el metodo all() trae un array o collecion de objetos, uno o varios dentro de una coleccion
