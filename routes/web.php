<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroJsonController;

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

Route::get('/', [LivroController::class, 'inicial'])-> name('inicial');
Route::get('/lista', [LivroController::class, 'lista'])-> name('lista');
Route::get('/lista/filtrar', [LivroController::class, 'filtrar'])-> name('filtrar') ;
Route::get('/adicionar', [LivroController::class, 'adicionar'])-> name('adicionar');
Route::get('/atualizar/{id}', [LivroController::class, 'atualizar'])-> name('atualizar');

Route::post('/adicionar', [LivroController::class, 'adicionarLivro'])-> name('adicionarLivro');

Route::delete('/deletar/{id}', [LivroController::class, 'deletar'])-> name('deletar');

Route::put('/atualizar/{id}', [LivroController::class, 'atualizarLivro'])-> name('atualizarLivro');

