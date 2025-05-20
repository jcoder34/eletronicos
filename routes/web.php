<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AparelhoEletricoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemVendidoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::resource('aparelho_eletrico', AparelhoEletricoController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('cliente', ClienteController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('funcionario', FuncionarioController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('item', ItemController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('item_vendido', ItemVendidoController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('marca', MarcaController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('venda', VendaController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

require __DIR__.'/auth.php';
