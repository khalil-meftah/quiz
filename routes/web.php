<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;


Route::get('/', function () {
    return view('welcome');
});
//route that shows chapiters list
    Route::resource('chapitre' ,'App\Http\Controllers\chapitreController');
    //route that shows modules liste
Route::resource('module' ,'App\Http\Controllers\moduleController');
