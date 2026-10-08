<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name("login");
Route::get('/register', [AuthController::class, 'showRegister'])->name("register");


Route::post('/register', [AuthController::class, 'register'])->name('registerCreer');
Route::post('/login', [AuthController::class, 'login'])->name('loginAction');


Route::post('/logout', [AuthController::class, 'logout'])->name('logoutAction');




Route::middleware('auth')->group(function() {
    
    Route::get('/home/{filter?}', [AuthController::class, 'showHome'])->name('home');
    Route::delete('/home', [TacheController::class, 'suppTache'])->name('supp');
    Route::delete('/homee', [ProjetController::class, 'suppProjet'])->name('suppprojet');
    Route::post('/tache', [TacheController::class, 'creerTache'])->name('tache');
    Route::post('/projet', [ProjetController::class, 'creerProjet'])->name('creerprojet');
    // middleware il verifie si l'user est connecté pour qu'il aille l'autorisation dutiliser se groupe de 
    //fonctions (routes) . Si l'user n'est pas connecté il le redirige vers la route login 
    //middle ware par defaut il cherche la route login donc par obligation on appelle la route login   
    //Route::get('/login', [AuthController::class, 'showLogin'])->   {{{{{name("login")}}}}}};
    Route::put('/modifier/{tache}', [TacheController::class, 'modifierTache'])->name('modifier'); 

    Route::post('/notes/json', [NoteController::class, 'ajouterNote'])->name('note.json.store'); 
    Route::get('/notes', [NoteController::class, 'showNote'])->name('note');

    Route::get('/notes/json', [NoteController::class, 'index']) ->name('note.json.list');

    Route::put('/notes/json/{note}', [NoteController::class, 'update'])->name('note.json.update'); 
    Route::delete('/notes/json/{note}', [NoteController::class, 'destroy'])->name('note.json.destroy'); 


});



