<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AparelhoEletricoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemVendidoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::resource('aparelho_eletrico', AparelhoEletricoController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('cliente', ClienteController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('funcionario', FuncionarioController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('item', ItemController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('item_vendido', ItemVendidoController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('marca', MarcaController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('venda', VendaController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';