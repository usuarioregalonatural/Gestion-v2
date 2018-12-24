# Documentación Gestión Regalo Natural

## Creación de entidades CRUD

### Clientes

####Crear la tabla de clientes en la parte de migraciones
*El nombre de tabla tiene que ser en minúsculas y en plural*
```
php artisan make:migration create_clientes_table --create=clientes
```
Esto creará el fichero <code>2018_12_24_155744_create_clientes_table.php</code> en la siguiente ruta:

```
database/migrations
```

Siguiente paso editar el fichero e incluir los campos necesarios en la tabla:
```php
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            --nuevo
            $table->integer('id_cliente');
            $table->string('nombre');
            --nuevo
            $table->timestamps();
        });
    }
```
Después ejecutar la migración desde la terminal
```
php artisan migrate
```

#### Crear el modelo cliente
El nombre del modelo debe ser en singular y con la primera letra en mayúsculas.
```
php artisan make:model Cliente
```
Después de ejecutarlo, deberá aprecer el siguiente fichero <code>app/Clientes.php</code>

Tendría este contenido:
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
}

```
Si quisieramos que la tabla Clientes tuviera relación, por ejemplo, con CategoriasCliente tendríamos que añadir a la clase lo siguiente:
```php
return $this->belongTo('App\CategoriaClientes');
```

quedando así:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   return $this->belongsTo('App\CategoriaClientes');
}

```
Para mostrar un atributo, podríamos añadir lo siguiente dentro de la clase:
```php
public function getNombre()
{
    return $this->nombre;
}
```
#### Creación de rutas de modelo
Esto nos permite crear urls amigables.

Nos iremos al fichero <code>routes/web.php</code> y lo editaremos para incluir la nueva ruta
```php
Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true, 'register' => false]);
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('home', function () {return view('inicio');});

-- Desde aquí es nuevo
// Mostrar todos los clientes
Route::get('/ver_clientes', function (){
    return view('clientes/ver_clientes');
});

// Agregar nuevo cliente
Route::post('/clientes', function (Request $request){
});

// Eliminar cliente
Route::delete('/cliente/{id}', function ($id){
});
```

Por ejemplo, para rutear cuando introducimos *'ver_clientes'* escribiremos que redirija a la vista: *clientes/ver_clientes*
```php
Route::get('/ver_clientes', function (){return view('clientes/ver_clientes');});
```

Una vez que le hemos dicho que rutee hacia una vista concreta (en este caso clientes/ver_clientes), deberíamos crear la vista si es que no existe.
La ruta donde se encuentra es:
<code>resources/views/clientes/ver_clientes.blade.php</code>

El contenido de este archivo debe ser como sigue:
```php
@extends('adminlte::page')


@section('content')
    <h1>Nuevo Cliente</h1>
@endsection
```
En este archivo añadiremos basándonos en los ejemplos de adminlte los elementos que necesitemos.

Lo primero que haremos será extender la clase de adminlte ya que estamos utilizando esta plantilla.
Después colocaremos el contenido entre las dos etiquetas de *@section*

Puede ser interesante incluir
```php
@include('common.errors')
```
para mostrar los errores del servidor.

Cuando colocamos un formulario en el archivo ver_clientes.blade.php, **debemos asegurarnos que para los apartados de los form, el for y el name deben ser el nombre del campo de la tabla a tratar**
```html
            <form class="form-horizontal" action="clientes/nuevo_cliente" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="nombre">
                        </div>
                    </div>
```
En este caso, for="nombre", name="nombre", porque "nombre" es el campo de la tabla.

Tambien es muy importante el valor del *action* del form. Debe ser la ruta hacia la cual queremos dirigir la respuesta
En nuestro caso, queremos enviarlo a la ruta /nuevo_cliente del archivo **routes.php**

Este es el extracto de **routes.php** hacia el cual será dirigido:
```php
// Agregar nuevo cliente
Route::post('/nuevo_cliente', function (Request $request){
});
```
Utilizando el objeto Request obtenemos toda la información enviada por el formulario e implementamos la lógica neceario para dar de alta el cliente.


#### Creando Controllers
Podemos crear un controlador para cada entidad con el comando:
```php
php artisan make:controller ProductosController --resource
```
con el parámetro <code>--resource</code> conseguimos que nos cree acciones Restful (crear, editar, etc.)

 
##### Validaciones Request

Para crear una nueva request ejecutamos el comando:
```bash
php artisan make:request ProveedoresFormRequest
```

Nos creará en la carpeta Http/Request un fichero para realizar las validaciones.

Dentro de este archivo tendremos que cambiar a TRUE el retorno de la función authorize.
```php
    public function authorize()
    {
        return true; <-- aquí
    }

```
En la parte de reglas (rules) podemos indicar nuevas condiciones de validación:
```php
    public function rules()
    {
        return [
            'nombre' => 'required|min:3',
            //
        ];
    }
```
En este ejemplo, validamos que sea obligatorio informar un dato (required) y que tenga una longitud mínima de 3 caracteres.


##### Laravel Collective
Laravel Collective es un proyecto que ha buscado rescatar y mantener algunas de las funcionalidades que se han removido del núcleo de Laravel durante sus actualizaciones pero que aun así siguen siendo de gran utilidad para algunos desarrolladores.


Actualmente cuenta con los paquetes Forms & Html, Annotations y Remote(SSH), que gracias a un gran trabajo realizado por toda la comunidad de Laravel siguen siendo mantenidos y actualizados hasta el momento

######Instalación
Ir hacia el archivo composer.json dentro del raiz y añadir lo siguiente:
```json
    "license": "MIT",
    "require": {
        "php": "^7.1.3",
        "fideloper/proxy": "^4.0",
        "jeroennoten/laravel-adminlte": "^1.24",
        "laravel/framework": "5.7.*",
        "laravel/tinker": "^1.0",
        "laravelcollective/html": "5.7.*"  <-- esta linea (y la coma anterior)
    },
```

Luego desde nuestro terminal debemos ejecutar:
```bash
composer update
```
Para utilizarlo, debemos ir a config/app.php y en la parte de *providers* añadir la siguiente línea:
```php
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Collective\Html\HtmlServiceProvider::class,  <-- Esta línea
```

luego, dentro del mismo archivo, en la parte de Aliases, añadir las dos siguientes líneas:
```php
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        'Form' => Collective\Html\FormFacade::class,    <-- Esta línea
        'Html' => Collective\Html\HtmlFacade::class,    <-- y esta otra

    ],
```
##### Seguimos con controllers
En web.php tendremos dos rutas para, por ejemplo, proveedores:
```php
Route::get('/proveedores', 'ProveedoresController@create');
Route::post('/proveedores', 'ProveedoresController@store');
```
La primera nos dirigirá a la función create del controler <code>ProveedoresController.php</code>

La segunda nos dirigirá a la función create del controler <code>ProveedoresController.php</code>

En la primera nos redirigirá desde <code>ProveedoresController.php</code> a la vista de alta 
```php
    public function create()
    {
        return view('proveedores.alta_proveedor');
    }
```

En la **primera** nos redirigirá desde <code>ProveedoresController.php</code> a la vista de alta donde nos mostrará el formulario de alta 
```php
    public function create()
    {
        return view('proveedores.alta_proveedor');
    }
```

En la **segunda** nos redirigirá desde <code>ProveedoresController.php</code> al almacenamiento de los datos
```php
    public function create()
    {
        return view('proveedores.alta_proveedor');
    }
```
Laravel nos exige referenciar una clase en el archivo <code>ProveedoresController.php</code>
```php
 <?php
 
 namespace App\Http\Controllers;
 
 use Illuminate\Http\Request;
 use App\Http\Requests\ProveedoresFormRequest; <-- Esta linea
 
 class ProveedoresController extends Controller
 {
...
```

Ahora vamos a actualizar el formulario de Proveedores para poder enviar peticiones POST
en alta_proveedor.blade.php incluimos POST en el formulario
```html
           <form class="form-horizontal" method="POST">
```
Luego le añadimos el nombre de los campos:

```html
           <form class="form-horizontal" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre"> <--se añade name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-sm-2 control-label">Dirección:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" placeholder="direccion" name="direccion"> <--se añade name
                        </div>
                    </div>
```

Ojo, no funcionará tal cual, hay que añadir en el formulario un campo oculto **token** 
```html
            <!-- form start -->
            <form class="form-horizontal" method="POST">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">  <-- Esta linea
                <div class="card-body">
 
```

una vez realizado, tras recargar la web y enviar la info debería aparecernos la info a enviar:
```json
{"_token":"8QazdyTPHnnJjxosseEoJM3XXDnlkMPkgyYtdpQy","nombre":"Pepe","direccion":"dfljdsl"}
```

Siguiente paso, aplicar la validación al objeto
 En  <code>ProveedoresController.php</code> dentro del la funcion  <code>store</code> debemos decirle que aplique las validaciones para Proveedores
```php
  public function store(ProveedoresFormRequest $request)
    {
        return $request->all();


    }
``` 
Para ello cambiaremos el parametro de la funcion store para que sea <code>ProveedoresFormRequest</code> como es indica en el código anterior.

Lo único es que cuando no cumple alguna de las reglas de validación, se queda en el misma página y no muestra nada.
Para evitarlo haremos lo siguiente. Donde reside el formulario "alta_proveedor.blade.php"  en la parte del **form**  añadiremos un *@foreach-error* para controlarlo.
Ojo, no funcionará tal cual, hay que añadir en el formulario un campo oculto **token** 
```html
            <!-- form start -->
            <form class="form-horizontal" method="POST">
            
                @foreach ($errors->all() as $error)             <--nueva
                <p class="alert alert-danger">{{ $error }}</p>  <--nueva
                @endforeach                                     <--nueva
                
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">  <-- Esta linea
                <div class="card-body">
 
```

### Insertando en la BBDD

En primer lugar nos vamos al controller. En este caso nos vamos a <code>app/Http/Controllers/ProveedoresController.php</code>

e incluimos la referencia a la clase Proveedor.
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProveedoresFormRequest;
use App\Proveedor;                              <--Esta linea

class ProveedoresController extends Controller
...
``` 
Después nos vamos a la función <code>store</code> y añadimos el siguiente contenido:
```php
   public function store(ProveedoresFormRequest $request)
    {
        $slug = uniqid();
        $proveedor = new Proveedor(array(
            'nombre' => $request->get('nombre'),
            'direccion' => $request->get('direccion'),
            'slug' => $slug
        ));
        $proveedor->save();
        return redirect('/alta_proveedor')->with('status','El proveedor has sido dado de alta. Su id es: ' .$slug);

    }
``` 
Esto aún no funcionará todavía, debemos configurar para evitar las inyección de código. Para ello nos iremos a objeto Proveedor (app/Proveedor.php) y

```php
 <?php
 
 namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 class Proveedor extends Model
 {
 
     protected $fillable =['nombre','direccion', 'slug']; <-- esta linea

``` 
Siguiente paso, vamos al formulario en <code>alta_proveedor.blade.php </code> y, después del bloque @foreach
```html
            <form class="form-horizontal" method="POST">
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))         <-Esto
                    <div class="alert-success"> <-Esto
                        {{session_status()}}    <-Esto
                    </div>                      <-Esto
                @endif                          <-Esto
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
```

