<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImagensController;
use App\Http\Controllers\PerguntasController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**Rota para o Login */
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('novo-usuario', [UserController::class, 'store']);

Route::middleware(['apiJWT'])->group(function () {
    /*Daqui para baixo todas as rotas que deverão estar protegidas*/
    
    /** Informações do usuário logado */
    Route::get('auth/logado', [AuthController::class, 'logado']); 
    /** Encerra o acesso */
    Route::get('auth/logout', [AuthController::class, 'logout']); 
    /** Atualiza o token */
    Route::get('auth/refresh', [AuthController::class, 'refresh']); 
    
});
