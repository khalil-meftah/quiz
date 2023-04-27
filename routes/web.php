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
    'chapitre' => chapitreController::class,
    'module' =>moduleController::class
]);
