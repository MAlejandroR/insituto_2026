<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SetLanguageController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/saludo', function () {
    return "hola";
});

Route::view("/ver", "saludo");

Route::get("/", [MainController::class, "index"])->name("main");

Route::fallback(function () {
    $ruta = request()->url();
    return "te has perdido gang, $ruta no existe";
});


Route::view("about", "about")->name("about");
Route::view("noticias", "noticias")->name("noticias");

Route::resource("projects", ProjectController::class);
;
require __DIR__.'/auth.php';


Route::get("/lang/{lang}", SetLanguageController::class)->name("set_lang");
