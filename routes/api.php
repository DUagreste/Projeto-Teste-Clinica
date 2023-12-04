<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\OrdemController;
use App\Http\Controllers\ExameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas de API para seu aplicativo. Esses
| rotas são carregadas pelo RouteServiceProvider e todas elas serão
| ser atribuído ao grupo de middleware "api".
|
*/


// apiResources é um recurso para diminuir o número de linhas.
// Ele agrupa todas as rotas e métodos.
Route::apiResources([
    'paciente' => PacienteController::class,
    'ordem' => OrdemController::class,
    'exame' => ExameController::class,
]);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
