<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/name/{name}', function ($name) {
    return 'Hola soy: '.$name;
});
Route::get('/name/{name}/lastname/{lastname}', function ($name,$lastname) {
    return 'Hola soy: '.$name.' '.$lastname;
});
Route::get('/name/{name}/lastname/{lastname?}', function ($name,$lastname=null) {
    return 'Hola soy: '.$name.' '.$lastname;
});

Route::get('/', function () {
    return 'Pantalla principal';
});

Route::get('/', function () {
    return 'Login usuario';
});

Route::get('/logout', function () {
    return 'Logout usuario';
});

Route::get('/catalog', function () {
    return 'Listado peliculas';
});

Route::get('/catalog/show/{id}', function ($id) {
    return 'Ver detalle pelicula '.$id;
});

Route::get('/catalog/create', function () {
    return 'Añadir pelicula';
});

Route::get('/catalog/edit/{id}', function ($id) {
    return 'Modificar pelicula '.$id;
});
*/

Auth::routes();
use App\Http\Controllers\RecetaController1;
Route::get('/receta', [RecetaController1::class, 'index'])->name('receta.index');
//Route::get('/recetas', [RecetaController::class, 'index']);
Route::get('/receta/create', [RecetaController1::class, 'create'])->name('receta.create');
Route::post('/receta', [RecetaController1::class, 'store'])->name('receta.store');
Route::get('/receta/{receta}', [RecetaController1::class, 'show'])->name('receta.show');
Route::get('/receta/{receta}/edit', [RecetaController1::class, 'edit'])->name('receta.edit');
Route::put('/receta/{receta}', [RecetaController1::class, 'update'])->name('receta.update');
Route::delete('/receta/{receta}', [RecetaController1::class, 'destroy'])->name('receta.destroy');


//use App\Http\Controllers\RecetaControllerSin;
//Route::get('/nosotross', [RecetaControllerSin::class, 'hola']);

//use App\Http\Controllers\HomeController;
//Route::get('/s', [HomeController::class, 'home']);

//use App\Http\Controllers\CatalogController;
//Route::get('/catalog', [CatalogController::class, 'catalog']);

//Route::get('/catalog/show/{id}', [CatalogController::class, 'show']);

//Route::get('/catalog/create', [CatalogController::class, 'create']);

//Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit']);



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
