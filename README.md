## Instalando traducciones
### Instalar paquetes para la utilidad

```bash
composer require  laravel-lang/common
```
> depdende de paquetes como php-intl y php-bcmath

### instalamos idiomas
Ahora debemos de cargar los idiomas que queremos utilizar
Esto creará fichero lang.json y carpeta correspondiente
```bash
php artisan lang:add es
```
### En el front

Creamos un componente desplegable para seleccionar el idioma

```html
<select class="bg-gray-300 p-2 m-2" name="lang" id="">
    <option value="" disabled selected>{{__("Selecciona idioma")}}</option>
    @foreach( config("languages") as $code => $content)
        <option>{{$content['name']}} {{$content['flag']}}</option>
    @endforeach
</select>
```
Para posibles ampliaciones, e3n lugar de escribir los idiomas que voy a utilizar, lo cargo a partir de un fichero de configuración que me da un array con los idiomas

De forma que si queremos añadir nuevos idiomas solo tenga que agrebar un nuevo elemento en el array
```php
<?php
return [
    "es" => [
        "name" => "Español",
        "flag" => "🇪🇸"
    ],
    "fr" => [
        "name" => "France",
        "flag" => "🇫🇷"
    ],
    "en" => [
        "name" => "English",
        "flag" => "🇬🇧"
    ]
];
```
Para las banderitas buscad en internet https://emojiterra.com/
### En el back
#### Crear un controlador 
Con el objetivo de que el usuario pueda cambiar el idioma, lo creo invokable por comodidad
```bash
php artisan make:Controller SetLangController -i
```
* Escribimos el código en el controlador
```php
    public function __invoke(string $lang)
    {
        session()->put('lang', $lang);
        app()->setLocale($lang);
        return redirect()->back();
        //
    }
```

### Middleawe
Como queremos que cualquier solicitud antes de ser atendida se establezca como variable de entorno lo que tenga en la variable se sesión (si la tengo), necesito un middleware (sofware que ejectua entre el request y el response)
```bash
php artisan make:Middleware SetLanguageMiddleware
```
Escribimos el código

##### Asocio el midlleware a todas las rutas que tenga en el fichero web.php
*Esto se hace en el fichero de inicio de la aplicación
./bootstrap/app.php
Ahí añadimos en la sección de Middleware
```php
->withMiddleware(function (Middleware $middleware): void {
$middleware->web(append:[
\App\Http\Middleware\SetLangMiddleware::class,
]);
//
})
```

Nos falta modificar el front con el evento que solicitará la ruta al back
```html
<select onchange="window.location.href=this.value" class="bg-gray-300 p-2 m-2" name="lang" id="">
    <option value="" disabled selected>{{__("Selecciona idioma")}}</option>
    @foreach( config("languages") as $code => $content)
        <option value="{{route("set_lang", $code)}}">{{$content['name']}} {{$content['flag']}}</option>
{{--        <option value="/lang/{{$code}}">{{$content['name']}} {{$content['flag']}}</option>--}}
    @endforeach
</select>
```

[Instalando switchAlert](./doc/switch_alert.md)
