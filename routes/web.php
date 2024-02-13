<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LivroController::class, 'inicial']);

Route::get('/lista', [LivroController::class, 'lista']);
Route::get('/lista/filtrar', [LivroController::class, 'filtrar']);

Route::get('/adicionar', [LivroController::class, 'adicionar']);
Route::post('/adicionar', [LivroController::class, 'adicionarLivro']);

Route::post('/deletar/{id}', [LivroController::class, 'deletar']);

Route::get('/atualizar/{id}', [LivroController::class, 'atualizar']);
Route::post('/atualizar', [LivroController::class, 'atualizarLivro']);

