<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/configuracion')->group(function () {
    
    Route::prefix('/categoria')->group(function (){
        Route::controller(CategoriaController::class)->group(function () {
            Route::get('/listar', 'index')->name('categoriaIndex');
            
            Route::get('/alta', 'create')->name('categoriaCreate');
            Route::post('/alta', 'store')->name('categoriaStore');
            
            Route::get('/modificar/{CategoriaID}', 'edit')->name('categoriaEdit');
            Route::put('/modificar/{CategoriaID}', 'update')->name('categoriaUpdate');
            
            Route::delete('/baja/{CategoriaID}', 'destroy')->name('categoriaDestroy');

        });
    });
   
    Route::prefix('/productos')->group(function (){
        Route::controller(ProductoController::class)->group(function () {
            Route::get('/listar', 'index')->name('productoIndex');
           
            Route::get('/alta', 'create')->name('productoCreate');
            Route::post('/alta', 'store')->name('productoStore');
           
            Route::get('/modificar/{ProductoID}', 'edit')->name('productoEdit');
            Route::put('/modificar/{ProductoID}', 'update')->name('productoUpdate');
           
            Route::delete('/baja/{ProductoID}', 'destroy')->name('productoDestroy');

        });
    });
});