<?php

use App\Http\Controllers\questionController;
use App\Http\Controllers\reponseController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\moduleController;


Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'question' => questionController::class,
    'reponse' => reponseController::class,
]);

//route that shows chapiters list
    Route::resource('chapitre' ,chapitreController::class);
//route that shows modules liste
    Route::resource('module' ,moduleController::class);

