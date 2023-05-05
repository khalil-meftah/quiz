<?php

use App\Http\Controllers\questionController;
use App\Http\Controllers\reponseController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\quizController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::resources([
    'question' => questionController::class,
    'reponse' => reponseController::class,
    'chapitre' => chapitreController::class,
    'module' =>moduleController::class
]);

// Route::get('/generatequiz', [quizController::class, 'index']);

Route::get('/quiz-generator', [quizController::class, 'index'])->name('quiz-generator');

Route::get('/quiz-generator/{module}/chapitres', [quizController::class, 'getChapitres'])->name('quiz-generator.chapitres');

Route::post('/quiz-generator/generate', [quizController::class, 'generate'])->name('quiz-generator.generate');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
