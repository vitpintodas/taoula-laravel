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
//API pour modifier les informations d'un utilisateur, exemple: http://1270.0.0.1:8000/api/users/1
Route::put('/users/{id}', [UserController::class, 'update']);
//API pour créer un utilisateur, exemple: http://1270.0.0.1:8000/api/users
Route::post('/users', [UserController::class, 'store']);
//API pour supprimer un utilisateur, exemple: http://1270.0.0.1:8000/api/users/1
Route::delete('/users/{id}', [UserController::class, 'destroy']);

//API pour réponses
Route::get('/reponses/{id}', [ReponseController::class, 'show']);
Route::post('/reponses', [ReponseController::class, 'store']);
Route::put('/reponses/{id}', [ReponseController::class, 'update']);
Route::delete('/reponses/{id}', [ReponseController::class, 'destroy']);

//API pour titres
Route::get('/titres/{id}', [TitreController::class, 'show']);
Route::post('/titres', [TitreController::class, 'store']);
Route::put('/titres/{id}', [TitreController::class, 'update']);
Route::delete('/titres/{id}', [TitreController::class, 'destroy']);

//API pour artistes
Route::get('/artistes/{id}', [ArtisteController::class, 'show']);
Route::post('/artistes', [ArtisteController::class, 'store']);
Route::put('/artistes/{id}', [ArtisteController::class, 'update']);
Route::delete('/artistes/{id}', [ArtisteController::class, 'destroy']);

//API pour playlists
Route::get('/playlists/{id}', [PlaylistController::class, 'show']);
Route::post('/playlists', [PlaylistController::class, 'store']);
Route::put('/playlists/{id}', [PlaylistController::class, 'update']);
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy']);

//API pour sondagesDefisConcours
Route::get('/sondages/{id}', [SondageDefisConcourController::class, 'show']);
Route::post('/sondages', [SondageDefisConcourController::class, 'store']);
Route::put('/sondages/{id}', [SondageDefisConcourController::class, 'update']);
Route::delete('/sondages/{id}', [SondageDefisConcourController::class, 'destroy']);
