<?php

use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Models\Categoria;
use App\Models\Producto;
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
    $productos = Producto::orderBy('Descripcion')->paginate(10);
    $categorias = Categoria::orderBy('Nombre')->get(); 
    return view('welcome')->with(['productos' => $productos ,'categorias' => $categorias]);
});

Route::view('/ingreso', 'usuarios.login')->name('login');

/* Route::prefix('/catalogo')->group(function () { */
    Route::get('/catalogo/{CategoriaID}', [ProductoController::class,'catalogo']);
/* }); */
Route::post('validarIngresoUsuario', [RegistroController::class, 'validarIngresoUsuario'])->name('validarIngreso');
Route::get('/registro', [RegistroController::class, 'crearUsuario'])->name('crearUsuario');
Route::post('/registro', [RegistroController::class, 'guardarUsuario'])->name('guardarUsuario');
Route::get('/desconectar', [RegistroController::class, 'desconectarUsuario'])->name('desconectarUsuario');

Route::middleware('auth')->group(function(){

    Route::prefix('/configuracion')->group(function () {
        
        Route::prefix('/producto')->group(function (){
            Route::controller(ProductoController::class)->group(function () {
                Route::get('/listar', 'index')->name('productoIndex');
                Route::get('/show/{ProductoID}', 'show')->name('productoShow');
            
                Route::get('/alta', 'create')->name('productoCreate');
                Route::post('/alta', 'store')->name('productoStore');
            
                Route::get('/modificar/{ProductoID}', 'edit')->name('productoEdit');
                Route::post('/modificar/{ProductoID}', 'update')->name('productoUpdate');
            
                Route::delete('/baja/{ProductoID}', 'destroy')->name('productoDestroy');
    
            });
        });
    
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

    });

});
