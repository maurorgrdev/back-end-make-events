<?php

use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\TipoServico\TipoServicoController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth.jwt',  "throttle:10000,1"], function () {
// });

// ------------------------
// Tipo Servico
// ------------------------
Route::resource ('/tipo-servico', TipoServicoController::class);

Route::post     ('/empresa/vincular-tipo-servico/{id}', [EmpresaController::class, 'vincularTiposServicos']);
Route::resource ('/empresa',                        EmpresaController::class);


Route::get('/testes', function () {
    return [
        'funcionando' => true
    ];
});
