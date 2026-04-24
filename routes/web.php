<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::redirect('/', '/login');

Route::get('/liste_user', [UserController::class, 'liste_utilisateur'])->name('liste_utilisateur');
Route::get('/ajoute_user', [UserController::class, 'ajouter_utilisateur'])->name('ajouter_utilisateur');
Route::get('/modifier_user/{id}', [UserController::class, 'modifier_utilisateur'])->name('modifier_utilisateur');
Route::get('/supprimer_utilisateur/{id}', [UserController::class, 'supprimer_utilisateur'])->name('supprimer_utilisateur');
Route::post('/ajoute_user/traitement', [UserController::class, 'ajouter_utilisateur_traitement'])->name('ajouter_utilisateur_traitement');
Route::post('/modifier_user/traitement', [UserController::class, 'modifier_utilisateur_traitement'])->name('modifier_utilisateur_traitement');



Route::get('/liste_demande1', [LeaveRequestController::class, 'liste_demande1'])->name('liste_demande1');
Route::put('/modifier_statut_demande/{id}', [LeaveRequestController::class, 'modifierStatutDemande'])->name('modifier_statut_demande');
Route::get('/demande/{id}/export-pdf', [LeaveRequestController::class, 'exportPdf'])->name('demande.export-pdf');

Route::get('/liste_demande', [LeaveRequestController::class, 'liste_demande'])->name('liste_demande');
Route::get('/ajoute_demande', [LeaveRequestController::class, 'ajouter_demande'])->name('ajouter_demande');
Route::get('/modifier_demande/{id}', [LeaveRequestController::class, 'modifier_demande'])->name('modifier_demande');
Route::post('/ajoute_conge/traitement', [LeaveRequestController::class, 'ajouter_conge_traitement'])->name('ajouter_conge_traitement');
Route::post('/modifier_conge/traitement', [LeaveRequestController::class, 'modifier_conge_traitement'])->name('modifier_conge_traitement');
Route::get('/supprimer_demande/{id}', [LeaveRequestController::class, 'supprimer_demande'])->name('supprimer_demande');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
