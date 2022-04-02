<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//endpoint per leggere i piloti checkati
Route::get('/checkPilotList/{race_id}', [App\Http\Controllers\api\PilotCheckListController::class, 'index']);
Route::put('/updateCheck/{pilot_id}', [App\Http\Controllers\api\PilotCheckListController::class, 'update']);

//endpoint per leggere le classifiche
Route::get('/pilotsRankings/{rank_id}', [App\Http\Controllers\api\RankingPilot::class, 'index']);

//endpoint per far inserire il nome delle gare nella instestazione della tabella
//Route::get('/pilotsRankings/{rank_id}', [App\Http\Controllers\api\RankingPilot::class, 'nameRace']);
