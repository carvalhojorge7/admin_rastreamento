<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PacotesController;
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


Route::post('auth/login', [AuthController::class, 'login']);
Route::get('rastrear_pacote/{codigo}', [PacotesController::class, 'rastrear_pacote']);
//Route::post('novo-usuario', [UserController::class, 'store']);

Route::middleware(['apiJWT'])->group(function () {
   
    Route::get('auth/logado', [AuthController::class, 'logado']);

    Route::get('auth/logout', [AuthController::class, 'logout']);

    Route::get('auth/refresh', [AuthController::class, 'refresh']);
    
    Route::apiResources([
        'pacotes' => PacotesController::class,
    ]);
    Route::post('busca/pacotes', [PacotesController::class, 'busca_e_atualiza']);
});
