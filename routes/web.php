<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ChercheurEtape as LivewireChercheurEtape;
use App\Http\Controllers\MultiStepFormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apropos', function () {
    return view('apropos');
});
Route::get('/formulaires', function () {
    return view('formulaires');
});
Route::get('/contact', function () {
    return view('contact');
});




Route::get('/multi-step-form', [MultiStepFormController::class, 'index'])->name('multi-step-form');

Route::post('/multi-step-form/store', [MultiStepFormController::class, 'store'])->name('multi-step-form.store');
Route::post('/multi-step-form/next', [MultiStepFormController::class, 'next'])->name('multi-step-form.next');
Route::post('/multi-step-form/previous', [MultiStepFormController::class, 'previous'])->name('multi-step-form.previous');
Route::view('/admin', 'admin');

Route::view('/chercheur', 'chercheur')->name('chercheur');

Route::view('/etape1autre', 'autrevues.etape1autre');
Route::view('/etape2autre', 'autrevues.etape2autre');
Route::view('/etape3autre', 'autrevues.etape3autre');
Route::view('/etape4autre', 'autrevues.etape4autre');
Route::view('/etape5autre', 'autrevues.etape5autre');
Route::view('/etape6autre', 'autrevues.etape6autre');
Route::view('/etapefinaleautre', 'autresvues.etapefinaleautre');

//Route::get('/multi-step-form', LivewireChercheurEtape::class)->name('multi-step-form');
Route::view('/etape1chercheur', 'chercheurvues.etape1chercheur');
Route::view('/etape2chercheur', 'chercheurvues.etape2chercheur')->name('etape2chercheur');
Route::view('/etape3chercheur', 'chercheurvues.etape3chercheur')->name('etape3chercheur');
Route::view('/etape4chercheur', 'chercheurvues.etape4chercheur')->name('etape4chercheur');
Route::view('/etape5chercheur', 'chercheurvues.etape5chercheur')->name('etape5chercheur');
Route::view('/etape6chercheur', 'chercheurvues.etape6chercheur')->name('etape6chercheur');
Route::view('/etapefinalechercheur', 'chercheurvues.etapefinalechercheur')->name('etapefinalechercheur');
Route::view('/accueil', 'accueil');