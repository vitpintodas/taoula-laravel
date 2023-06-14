<?php

use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\SondageDefisConcourController;
use App\Http\Controllers\TitreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API pour donners les informations d'un utilisateur, exemple: http://1270.0.0.1:8000/api/users/1
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/reponses/{id}', [ReponseController::class, 'show']);
Route::get('/titres/{id}', [TitreController::class, 'show']);
Route::get('/artistes/{id}', [ArtisteController::class, 'show']);
Route::get('/playlists/{id}', [PlaylistController::class, 'show']);
Route::get('/sondages/{id}', [SondageDefisConcourController::class, 'show']);