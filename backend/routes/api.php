<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PagoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sorteos', [SorteoController::class, 'index']);

Route::post('/compras', [CompraController::class, 'store']);
Route::post('/pagos/webpay/iniciar', [PagoController::class, 'iniciar']);

Route::match(
    ['get', 'post'],
    '/pagos/webpay/confirmar',
    [PagoController::class, 'confirmar']
);