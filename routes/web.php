<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormSurveyController;
use App\Http\Controllers\FormAlumniController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\InfoAlumniController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/form-survey', [FormSurveyController::class, 'formsurvey'])->name('menu.formsurvey');
Route::post('/form-survey', [FormSurveyController::class, 'store'])->name('formsurvey.store');



Route::get('/formalumni', [FormAlumniController::class, 'formalumni'])->name('menu.formalumni');
Route::post('/formalumni/store', [FormAlumniController::class, 'store'])->name('formalumni.store');



Route::get('/statistik', [StatistikController::class, 'statistik'])->name('menu.statistik');


Route::get('/lowongan', [LowonganKerjaController::class, 'infolowongan'])->name('infolowongan');  
Route::get('/lowongan/{id}', [LowonganKerjaController::class, 'show'])->name('menu.detail-lowongan');


Route::get('/infoalumni', [InfoAlumniController::class, 'infoalumni'])->name('infoalumni');

