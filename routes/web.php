<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\reponseController;
use App\Http\Controllers\questionReponseController;
use App\Http\Controllers\quizController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'question' => questionController::class,
    'reponse' => reponseController::class,
    'question-reponse' => questionReponseController::class,
    'chapitre' => chapitreController::class,
    'module' =>moduleController::class,
]);



Route::get('/question-reponse/{module}/chapitres', [questionReponseController::class, 'getChapitres'])->name('question-reponse.chapitres');
Route::post('/question-reponse/searchByChap', [questionReponseController::class, 'searchByChap'])->name('question-reponse.searchByChap');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Route::get('/generatequiz', [quizController::class, 'index']);

Route::get('/quiz-generator', [quizController::class, 'index'])->name('quiz-generator');
Route::get('/quiz-generator/{module}/chapitres', [quizController::class, 'getChapitres'])->name('quiz-generator.chapitres');
Route::post('/quiz-generator/generate', [quizController::class, 'generate'])->name('quiz-generator.generate');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -------------------------------------PROFESSEUR---------------------------------------------
Route::middleware(['auth','userAccess:professeur'])->group(function () {
    Route::get("/professeur", [HomeController::class, 'professeurHome']);
});

// -----------------------------------------MAINTENEUR-----------------------------------------------------------
Route::middleware(['auth','userAccess:mainteneur'])->group(function () {
    Route::get("/mainteneur",[HomeController::class, 'mainteneur']);
});
// -----------------------------ADMINISTRATEUR-----------------------------------------------------------
Route::middleware(['auth','userAccess:administrateur'])->group(function () {
    Route::get("/administrateur",[HomeController::class, 'administrateur']);});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
