<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});
// Ruta principal que nos ayudara a movernos por las distintas paginas, con la ayuda de nuestro controlador
Route::resource('pedidos', PedidoController::class);
