<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});

Route::get('produtos', [ProdutoController::class, 'read'])->name('produtos.read');
Route::get('produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::post('produtos', [ProdutoController::class, 'create'])->name('produtos.create');
Route::put('produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('produtos/{produto}', [ProdutoController::class, 'remove'])->name('produtos.remove');