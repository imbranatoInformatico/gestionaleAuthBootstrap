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

//rotte per le categorie
Route::get('/newCategory/{codiceEvento}', [App\Http\Controllers\CategoryController::class, 'create'])->name('newCategory');
Route::post('/newCategoryStore', [App\Http\Controllers\CategoryController::class, 'store'])->name('newCategoryStore');
Route::get('/categoryList/{codiceEvento}', [App\Http\Controllers\CategoryController::class, 'index'])->name('categoryList');

//rotte per piloti
Route::get('/newPilot/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'create'])->name('newPilot');
Route::post('/newPilotStore', [App\Http\Controllers\PilotController::class, 'store'])->name('newPilotStore');
Route::get('/pilotList/{codiceEvento}', [App\Http\Livewire\FiltroPiloti::class, 'pilotListIndex'])->name('pilotList');
Route::get('/editPilot/{codiceEvento}/{id}', [App\Http\Controllers\PilotController::class, 'edit'])->name('editPilot');
Route::put('/updatePilot/{id}', [App\Http\Controllers\PilotController::class, 'update'])->name('updatePilot');
Route::get('/pilotReservation/{codiceEvento}/{id}', [App\Http\Controllers\PilotController::class, 'reservation'])->name('pilotReservation');
Route::post('/reservationPilotStore', [App\Http\Controllers\PilotController::class, 'reservationStore'])->name('reservationPilotStore');
Route::get('/raceSelectReservation/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'raceSelectIndex'])->name('raceSelectReservation');
Route::get('/reservationPilotList/{codiceEvento}', [App\Http\Controllers\PilotController::class, 'reservationPilotListIndex'])->name('reservationPilotList');
Route::put('/pilotCheck/{id}', [App\Http\Controllers\PilotController::class, 'check'])->name('pilotCheck');
Route::delete('/deletPilotPresence/{codiceEvento}/{id}/{race_id}', [App\Http\Controllers\PilotController::class, 'destroyPresence'])->name('deletPilotPresence');



//rotte per prenotazione pilota 
Route::get('/newReservation/{codiceEvento}', [App\Http\Controllers\ReservationController::class, 'create'])->name('newReservation');




//rotte per team
Route::get('/newTeam/{codiceEvento}', [App\Http\Controllers\TeamController::class, 'create'])->name('newTeam');
Route::post('/newTeamStore', [App\Http\Controllers\TeamController::class, 'store'])->name('newTeamStore');

//rotte per gara
Route::get('/newRace/{codiceEvento}', [App\Http\Controllers\RaceController::class, 'create'])->name('newRace');
Route::post('/newRaceStore', [App\Http\Controllers\RaceController::class, 'store'])->name('newRaceStore');








