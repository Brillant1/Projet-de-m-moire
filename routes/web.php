<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\Admin\DemandeController;


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
    return view('front.accueil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('centres', CentreController::class);
Route::resource('communes', CommuneController::class);
Route::resource('departements', DepartementController::class);
Route::resource('candidats', CandidatController::class);
Route::resource('demandes', App\Http\Controllers\DemandeController::class)->middleware(['auth']);
// Route::post('storeDemande', [App\Http\Controllers\DemandeController::class,'storeDemande'])->name('storeDemande');
Route::get('listeDemande', [App\Http\Controllers\Admin\GererDemandeController::class,'listeDemande'])->name('listeDemande');
Route::get('singleDemande/{demande}', [App\Http\Controllers\Admin\GererDemandeController::class, 'singleDemande'])->name('singleDemande');
Route::post('changeState/{demande}', [App\Http\Controllers\Admin\GererDemandeController::class, 'changeState'])->name('changeState');
Route::get('demandeUser', [App\Http\Controllers\DemandeController::class, 'demandeUser'])->name('demandeUser')->middleware(['auth']);


Route::post('alertInvalidDemande',[AlerteController::class, 'alertInvalidDemande'])->name('alertInvalidDemande');

Route::get('accueil', function(){
    return view('front/accueil');
})->name('accueil');

Route::get('actualites', function(){
    return view('front/actualites');
})->name('actualites');

Route::get('connexion' ,function(){
    return view('AuthUser.connexion');
})->name('connexion');

Route::get('inscription' ,function(){
    return view('AuthUser.inscription');
})->name('inscription');

Route::get('changePassword' ,function(){
    return view('AuthUser.changePassword');
})->name('changePassword');

Route::get('forgotPassword' ,function(){
    return view('auth.forgot-password');
})->name('forgotPassword');

Route::get('emailConfirmation' ,function(){
    return view('AuthUser.emailConfirmation');
})->name('emailConfirmation');





