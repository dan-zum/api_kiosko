<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() { //:sanctum: Es el guard de autenticación que Laravel debe utilizar. Laravel tiene varios guards (como web para sesiones tradicionales). Al especificar :sanctum, le dices a Laravel que busque la autenticación a través de tokens API (que es el método que usa Laravel Sanctum).
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    // Almacenar ordenes
    Route::apiResource('/pedidos', PedidoController::class );
    Route::apiResource('/categorias', CategoriaController::class);
    Route::apiResource('/productos', ProductoController::class);

});




// Autenticacion, esto de la clase de validacion
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);