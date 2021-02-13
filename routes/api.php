<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);



Route::resource('articulo', 'ArticuloController');


Route::resource('user', 'UserController');
Route::resource('rol', 'RolController');
Route::resource('marca', 'MarcaController');
Route::resource('categoria', 'CategoriaController');
Route::resource('ubicacion', 'UbicacionController');
Route::resource('tipo', 'TipoController');
Route::resource('proveedor', 'ProveedorController');
Route::resource('status', 'StatusController');
