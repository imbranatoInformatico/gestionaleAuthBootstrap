<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/newEvent', [App\Http\Controllers\EventController::class, 'create'])->name('newEvent');
Route::post('/newEventStore', [App\Http\Controllers\EventController::class, 'store'])->name('newEventStore');
Route::get('/showDaFormCrea', [App\Http\Controllers\DashboardController::class, 'showDaFormCrea'])->name('showDaFormCrea');
Route::post('/dashboard', [App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard');
Route::get('/impostazioni', [App\Http\Controllers\ImpostazioniController::class, 'index'])->name('impostazioniIndex');

//rotte per le categorie********************************************//
Route::get('/newCategory/{codiceEvento}', [App\Http\Controllers\CategoryController::class, 'create'])->name('newCategory');
Route::post('/newCategoryStore', [App\Http\Controllers\CategoryController::class, 'store'])->name('newCategoryStore');
Route::get('/categoryList/{codiceEvento}', [App\Http\Controllers\CategoryController::class, 'index'])->name('categoryList');
Route::get('/editCategory/{codiceEvento}/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
Route::put('/updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
Route::delete('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');
/*****************************************************************/

//rotte per team ********************************************//
Route::get('/newTeam/{codiceEvento}', [App\Http\Controllers\TeamController::class, 'create'])->name('newTeam');
Route::post('/newTeamStore', [App\Http\Controllers\TeamController::class, 'store'])->name('newTeamStore');
Route::get('/teamList/{codiceEvento}', [App\Http\Controllers\TeamController::class, 'index'])->name('teamList');
Route::get('/editTeam/{codiceEvento}/{id}', [App\Http\Controllers\TeamController::class, 'edit'])->name('editTeam');
Route::put('/updateTeam/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('updateTeam');
Route::delete('/deleteTeam/{id}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('deleteTeam');
/*****************************************************************/

//rotte per piloti********************************************//
Route::get('/newPilot/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'create'])->name('newPilot');
Route::post('/newPilotStore', [App\Http\Controllers\PilotController::class, 'store'])->name('newPilotStore');
Route::get('/pilotList/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'index'])->name('pilotList');
Route::get('/editPilot/{codiceEvento}/{id}', [App\Http\Controllers\PilotController::class, 'edit'])->name('editPilot');
Route::put('/updatePilot/{id}', [App\Http\Controllers\PilotController::class, 'update'])->name('updatePilot');
Route::delete('/deletPilot/{id}', [App\Http\Controllers\PilotController::class, 'destroy'])->name('deletPilot');
Route::get('/showPilot/{codiceEvento}/{id}', [App\Http\Controllers\PilotController::class, 'show'])->name('showPilot');
Route::get('/pilotReservation/{codiceEvento}/{id}', [App\Http\Controllers\PilotController::class, 'reservation'])->name('pilotReservation');
Route::post('/reservationPilotStore', [App\Http\Controllers\PilotController::class, 'reservationStore'])->name('reservationPilotStore');
Route::get('/raceSelectReservation/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'raceSelectIndex'])->name('raceSelectReservation');
Route::get('/reservationPilotList/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'reservationPilotListIndex'])->name('reservationPilotList');
Route::put('/pilotCheck/{id}', [App\Http\Controllers\PilotController::class, 'check'])->name('pilotCheck');
Route::delete('/deletPilotPresence/{codiceEvento}/{id}/{race_id}', [App\Http\Controllers\PilotController::class, 'destroyPresence'])->name('deletPilotPresence');
/*****************************************************************/


//rotte per le gare********************************************
Route::get('/newRace/{codiceEvento}', [App\Http\Controllers\RaceController::class, 'create'])->name('newRace');
Route::post('/newRaceStore', [App\Http\Controllers\RaceController::class, 'store'])->name('newRaceStore');
Route::get('/raceList/{codiceEvento}', [App\Http\Controllers\RaceController::class, 'index'])->name('raceList');
Route::get('/editRace/{codiceEvento}/{id}', [App\Http\Controllers\RaceController::class, 'edit'])->name('editRace');
Route::put('/updateRace/{id}', [App\Http\Controllers\RaceController::class, 'update'])->name('updateRace');
Route::delete('/deleteRace/{id}', [App\Http\Controllers\RaceController::class, 'destroy'])->name('deleteRace');

/*****************************************************************/


//rotte per le classifiche********************************************
Route::get('/newRanking/{codiceEvento}', [App\Http\Controllers\RankingController::class, 'create'])->name('newRanking');
Route::post('/newRankingStore', [App\Http\Controllers\RankingController::class, 'store'])->name('newRankingStore');
Route::get('/rankingList/{codiceEvento}', [App\Http\Controllers\RankingController::class, 'index'])->name('rankingList');
Route::get('/editRanking/{codiceEvento}/{id}', [App\Http\Controllers\RankingController::class, 'edit'])->name('editRanking');
Route::put('/updateRanking/{id}', [App\Http\Controllers\RankingController::class, 'update'])->name('updateRanking');
Route::delete('/deleteRanking/{id}', [App\Http\Controllers\RankingController::class, 'destroy'])->name('deleteRanking');
/*****************************************************************/

//rotte per punteggi********************************************
Route::get('/newScore/{codiceEvento}', [App\Http\Controllers\ScoreController::class, 'create'])->name('newScore');
Route::post('/newRankingStore', [App\Http\Controllers\ScoreController::class, 'store'])->name('newScoreStore');
/*****************************************************************/






