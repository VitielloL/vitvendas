<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/auth',[LoginController::class,'auth'])->name('auth.user');
Route::post('/store',[LoginController::class,'store'])->name('store.user');
Route::get('/registrar', [LoginController::class, 'registrar'])->name('registrar');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/venda', [VendaController::class, 'index'])->name('venda');
    Route::get('/venda/novo', [VendaController::class, 'create'])->name('venda.novo');
    Route::post('/venda/store', [VendaController::class, 'store'])->name('venda.store');
    Route::get('/venda/{id}', [VendaController::class, 'show'])->name('venda.show');
    Route::get('/venda/editar/{id}', [VendaController::class, 'edit'])->name('venda.editar');
    Route::put('/venda/update/{id}', [VendaController::class, 'update'])->name('venda.update');
    Route::get('/venda/remover/{id}', [VendaController::class, 'destroy'])->name('venda.remover');


    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/cliente/novo', [ClienteController::class, 'create'])->name('cliente.novo');
    Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit'])->name('cliente.editar');
    Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::get('/cliente/remover/{id}', [ClienteController::class, 'destroy'])->name('cliente.remover');

    Route::get('/produto', [ProdutoController::class, 'index'])->name('produto');
    Route::get('/produto/novo', [ProdutoController::class, 'create'])->name('produto.novo');
    Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('/produto/editar/{id}', [ProdutoController::class, 'edit'])->name('produto.editar');
    Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::get('/produto/remover/{id}', [ProdutoController::class, 'destroy'])->name('produto.remover');
});
