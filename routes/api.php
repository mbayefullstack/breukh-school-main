<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\MesControllers\SortieController;
use App\Http\Controllers\NiveauxController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SemestreController;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('niveaux',NiveauxController::class)
->only(['index']);

Route::name('coef.store')
    ->get('/classes/{id}/coef',[ClasseController::class,'indexCoef']);
Route::name('coef.index')
    ->post('/classes/{id}/coef',[ClasseController::class,'storeCoef']);
Route::apiResource('classes',ClasseController::class)
->only('index');

Route::name('eleves.sortie')
->put('eleves/sortie',[EleveController::class,'sortie']);
Route::apiResource('eleves',EleveController::class)
->only(['store']);

Route::apiResource('disciplines',DisciplineController::class)
->only(['index','store']);

Route::apiResource('evaluations',EvaluationController::class)
->only(['index','store']);

Route::apiResource('semestres',SemestreController::class)
->only(['index','store']);

Route::post('classes/{classe}/disciplines/{discipline}/evals/{eval}',[NoteController::class,'store'])
->name('note.store');

Route::name('evenements.participation')->post('/evenements/{evenement}/participation',[EvenementController::class,'paticipation']);
Route::apiResource('evenements',EvenementController::class)
->only(['index','store','show']);

















Route::put('/eleves/sorties',[SortieController::class,'getOut']);
Route::post('/classes/{class}/disciplines/{discipline}/evaluations/{eval}',[SortieController::class,'insertNote']);
Route::get('/classes/{class}/disciplines/{discipline}/evaluations/{eval}',[SortieController::class,'AfficherNote']);

