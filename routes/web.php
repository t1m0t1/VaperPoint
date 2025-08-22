<?php

use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
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

Route::get('/catalogo/{CategoriaID}', [ProductoController::class,'catalogo']);
Route::post('validarIngresoUsuario', [RegistroController::class, 'validarIngresoUsuario'])->name('validarIngreso')->middleware('throttle:6,1');
Route::get('/registro', [RegistroController::class, 'crearUsuario'])->name('crearUsuario');
Route::post('/registro', [RegistroController::class, 'guardarUsuario'])->name('guardarUsuario');
Route::get('/desconectar', [RegistroController::class, 'desconectarUsuario'])->name('desconectarUsuario');

Route::middleware('auth')->group(function(){
    Route::view('/home', 'auth.home')->name('home');

    Route::get('changePasswordform', [RegistroController::class, 'changePasswordform'])->name('changePasswordform');
    Route::post('changePasswordform', [RegistroController::class, 'changePassword'])->name('changePassword');
    #Inicio de Configuracion
        Route::prefix('/configuracion')->group(function () {
            #Inicio de Producto
                Route::prefix('/producto')->group(function (){
                    Route::controller(ProductoController::class)->group(function () {
                        Route::get('/listar', 'index')->name('listarProducto');
                        Route::get('/mostrar/{ProductoID}', 'mostrarProducto')->name('mostrarProducto');
                    
                        Route::get('/alta', 'create')->name('altaProducto');
                        Route::post('/alta', 'store')->name('generarProducto');
                    
                        Route::get('/modificar/{ProductoID}', 'edit')->name('modificarProducto');
                        Route::post('/modificar/{ProductoID}', 'update')->name('guardarProducto');
                    
                        Route::delete('/baja/{ProductoID}', 'destroy')->name('bajaProducto');
            
                    });
                });
            #Fin de Producto
            #Inicio de Categoria 
                Route::prefix('/categoria')->group(function (){
                    Route::controller(CategoriaController::class)->group(function () {
                        Route::get('/listar', 'index')->name('listarCategoria');
                        Route::get('/alta', 'create')->name('altaCategoria');
                        Route::post('/alta', 'store')->name('generarCategoria');
                        Route::get('/modificar/{CategoriaID}', 'edit')->name('modificarCategoria');
                        Route::put('/modificar/{CategoriaID}', 'update')->name('guardarCategoria');
                        Route::delete('/baja/{CategoriaID}', 'destroy')->name('bajaCategoria');
                    });
                });
            #Fin de Categoria;
        });
    #Fin de Configuracion
    #Inicio de Venta
        Route::prefix('/venta')->group(function (){
            Route::controller(VentaController::class)->group(function () {
                Route::get('/listar', 'index')->name('listarVenta');
                Route::get('/alta', 'create')->name('altaVenta');
                Route::post('/alta', 'store')->name('generarVenta');
            });
    #Fin de Venta
    #Inicio de Cliente
            Route::prefix('/cliente')->group(function () {
                Route::controller(ClienteController::class)->group(function (){
                    Route::get('/listar', 'index')->name('listarCliente');
                    Route::get('/alta', 'create')->name('altaCliente');
                    Route::post('/alta', 'store')->name('generarCliente');
                    Route::get('/modificar', 'edit')->name('modificarCliente');
                    Route::put('/modificar', 'update')->name('guardarCliente');
                    Route::put('/baja', 'destroy')->name('bajaCliente');
                });
            });
        });
    #Fin de Cliente
});


