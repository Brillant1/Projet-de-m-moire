<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\FlashInfoController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\Admin\ExamenController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\GererDemandeController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\DemandeController as ControllersDemandeController;

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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::resource('centres', CentreController::class);
    Route::resource('communes', CommuneController::class);
    Route::resource('departements', DepartementController::class);
    //Route::put('update-departement',[ DepartementController::class, 'update_departement'])->name('update-departement');
    Route::resource('candidats', CandidatController::class);
    Route::resource('alertes', AlerteController::class);
    Route::resource('flashInfos', FlashInfoController::class);
    Route::resource('examens', ExamenController::class);
    Route::resource('colleges', CollegeController::class);

    Route::get('demande/create', [App\Http\Controllers\DemandeController::class, 'index'])->name('before-demande');
    Route::post('demande/create', [App\Http\Controllers\DemandeController::class, 'beforeDemande']);
    
    Route::post('changeStateExamen/{examen}', [ExamenController::class, 'changeStateExamen'])->name('changeStateExamen');

    Route::resource('demandes', App\Http\Controllers\DemandeController::class)->except(['store','create'])->middleware(['auth']);

    Route::post('validationDemande', [App\Http\Controllers\DemandeController::class, 'store'])->name('validationDemande');

    Route::post('attestation-eleve', [GererDemandeController::class, 'attestation'])->name('attestation-eleve');


    Route::get('changeToPayState/{demande}', [App\Http\Controllers\DemandeController::class, 'changeToPayState'])->name('changeToPayState');
    Route::post('changeStateToGenerer/{demande}', [App\Http\Controllers\Admin\GererDemandeController::class, 'pdf2'])->name('changeStateToGenerer');

    Route::resource('alertes', AlerteController::class);
    //Route::post('storeDemande', [App\Http\Controllers\DemandeController::class,'storeDemande'])->name('storeDemande');
    Route::get('listeDemande', [App\Http\Controllers\Admin\GererDemandeController::class, 'listeDemande'])->name('listeDemande');
    Route::post('demandes/liste', [App\Http\Controllers\Admin\GererDemandeController::class,'dynamicSearchAllDemande'])->name('demandes-liste');

    Route::get('demandeRecente', [App\Http\Controllers\DemandeController::class, 'demandeRecente'])->name('demande-recente');
    Route::get('demandeApprouvee', [App\Http\Controllers\DemandeController::class, 'demandeApprouvee'])->name('demande-approuvee');
    Route::get('demandeGeneree', [App\Http\Controllers\DemandeController::class, 'demandeGeneree'])->name('demande-generee');
    Route::get('attestations', [AttestationController::class, 'all_attestation'])->name('attestation-all');
    Route::get('demandeNonPayee', [App\Http\Controllers\DemandeController::class, 'demandeNonPayee'])->name('demande-non-payee');

    Route::get('singleDemande/{demande}', [App\Http\Controllers\Admin\GererDemandeController::class, 'singleDemande'])->name('singleDemande');
    Route::post('changeState/{demande}', [App\Http\Controllers\Admin\GererDemandeController::class, 'changeState'])->name('changeState');
    Route::post('restaureDemande', [App\Http\Controllers\Admin\GererDemandeController::class, 'restaureDemande'])->name('restaureDemande');
    Route::get('demandeUser', [App\Http\Controllers\DemandeController::class, 'demandeUser'])->name('demandeUser')->middleware(['auth']);
    Route::post('demandes.tempStore', [App\Http\Controllers\DemandeController::class, 'tempStore'])->name('demandes.tempStore');
    Route::get('demandes.pdf/{id}', [App\Http\Controllers\DemandeController::class, 'pdf'])->name('demandes.pdf');
    Route::get('attestation/{demande}', [GererDemandeController::class, 'pdf2'])->name('attestation');
    Route::post('alertInvalidDemande', [AlerteController::class, 'alertInvalidDemande'])->name('alertInvalidDemande');

    Route::get('dowloadUserFile/{lien}', [GererDemandeController::class, 'dowloadUserFile'])->name('dowload');
    Route::get('downloadReleve/{id}', [App\Http\Controllers\DemandeController::class, 'download_releve'])->name('download-releve');
    Route::get('downloadActe/{id}', [App\Http\Controllers\DemandeController::class, 'download_acte'])->name('download-acte');
    Route::get('downloadACni/{id}', [App\Http\Controllers\DemandeController::class, 'download_cni'])->name('download-cni');

    // Route pour changer les communes en fonction du département
    Route::post('/communesOfDepartement', [App\Http\Controllers\DemandeController::class, 'communesOfDepartement' ])->name('communes-of-departement');
    Route::post('/centreOfCommune', [App\Http\Controllers\DemandeController::class, 'centreOfCommune' ])->name('centre-of-commune');

    Route::get('paiement', function () {
        return view('front.paiement');
    });
    

});



Route::get('contact',[ContactController::class, 'create'])->name('contact-create');
Route::post('contacts/store',[ContactController::class ,'store'])->name('contactstore');

Route::get('accueil', [HomeController::class,'index'])->name('accueil');
Route::get('/', [HomeController::class,'redirectIndex']);


Route::get('downloadAttestation', [App\Http\Controllers\DemandeController::class, 'download_attestation'])->name('download-attestation');

// Route::get('downloadCandidateAttestation/{id}', [App\Http\Controllers\AttestationController::class, 'download_attestation'])->name('download-candidate-attestation');



Route::get('downloadDocument/{id}', [App\Http\Controllers\DemandeController::class, 'downloadDocument'])->name('downloadDocument');


Route::get('actualites', function () {
    return view('front/actualites');
})->name('actualites');

Route::get('connexion', function () {
    return view('AuthUser.connexion');
})->name('connexion');

Route::get('inscription', function () {
    return view('AuthUser.inscription');
})->name('inscription');

Route::get('changePassword', function () {
    return view('AuthUser.changePassword');
})->name('changePassword');

Route::get('forgotPassword', function () {
    return view('auth.forgot-password');
})->name('forgotPassword');

Route::get('emailConfirmation', function () {
    return view('AuthUser.emailConfirmation');
})->name('emailConfirmation');




Route::get('demande/page', function(){
    return view('front.demandeRule');
})->name('demande/page');


Route::get('aide', function () {
    return view('front.demandeRule');
})->name('aide');


Route::get('serviceDec', function () {
    return view('front.service');
})->name('service-dec');

Route::get('motDec', function () {
    return view('front.motDec');
})->name('mot-dec');

Route::get('header2', function () {
    return view('front.layouts.header2');
})->name('header2');

Route::get('test', function () {
    return view('front.test');
})->name('test');
Route::get('attestation1', function(){
    return view('emails.attestation');
})->name('attestation1');
Route::get('pdf', function(){
    return view('front.pdf');
});
