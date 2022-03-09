<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LineaPedidoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RepartidorController;
use App\Models\Plato;
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
    $sliders = Plato::orderBy('popularidad')->take(3)->get();
    $platos = Plato::all();
    return view('welcome', compact('sliders','platos'));
})->name('inicio');

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/home', function () {
    $sliders = Plato::orderBy('popularidad')->take(3)->get();
    $platos = Plato::all();
    return view('welcome', compact('sliders','platos'));
})->name('home');



Route::post('/lineas/create/{plato}', [App\Http\Controllers\LineaPedidoController::class, 'store'])->name('linea.store');

Route::group(['middleware' => ['ComprobarRol:cliente']], function () {
    Route::get('/clientes/{cliente}/pedidos', [PedidoController::class, 'pedidosCliente'])->name('cliente.pedidos');
    Route::get('/clientes/{cliente}/pedidos/{pedido}', [PedidoController::class, 'pedidoCliente'])->name('cliente.pedido');
});
Route::group(['middleware' => ['ComprobarRol:repartidor']], function () {
    Route::get('/repartos', [RepartidorController::class, 'showRepartos'])->name('repartidor.showRepartos');
    Route::get('/repartos/{pedido}/entregado', [PedidoController::class, 'entregado'])->name('repartidor.entregado');
    Route::get('/repartos/cambiarestado', [RepartidorController::class, 'cambiarestado'])->name('repartidor.cambiarestado');
});
Route::group(['middleware' => ['ComprobarRol:restaurante']], function () {
    Route::get('/restaurantes/del/{restaurante}', [RestauranteController::class, 'destroy'])->name('restaurantes.delete');
    Route::get('/restaurantes/{restaurante}/pedidos', [RestauranteController::class, 'showPedidos'])->name('Restaurante.showPedidos');
    Route::get('/restaurantes/{restaurante}/pedidos/{pedido}/validar', [PedidoController::class, 'validar'])->name('Pedido.validar');
    Route::get('/restaurantes/{restaurante}/pedidos/{pedido}/repartir', [PedidoController::class, 'repartir'])->name('Pedido.repartir');
    Route::get('/restaurantes/listado', [RestauranteController::class, 'listadoRestaurantes'])->name('Restaurante.listado');
    Route::get('/restaurantes/listado/get', [RestauranteController::class, 'getRestaurante'])->name('Restaurante.listado-get');
    Route::get('/restaurantes/{restaurante}/platos/del/{plato}', [PlatoController::class, 'destroy'])->name('platos.delete');
});



Route::resources([
    'restaurantes' => RestauranteController::class,
    'pedidos' => PedidoController::class,
    'restaurantes/{restaurante}/platos' => PlatoController::class,
]);

