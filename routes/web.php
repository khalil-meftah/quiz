<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\reponseController;
use App\Http\Controllers\manageUser;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Activite;
use App\Http\Controllers\quizController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('welcome');
});
// -------------------------------------------GERER MEMBRES---------------------------------------------------
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::resource('/user', manageUser::class);
});
// -----------------------------------------USER SETTINGS---------------------------------------------------
Route::prefix('profile')->middleware('auth')->group(function() {
    Route::get('/membre', [userController::class, 'index'])->name('profile.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('user.destroy');
});
// -----------------------------------------CRUD ELEMENTS--------------------------------------------
Route::resources([
    'question' => questionController::class,
    'reponse' => reponseController::class,
    'chapitre' => chapitreController::class,
    'module' =>moduleController::class
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
// Route::get('/generatequiz', [quizController::class, 'index']);

Route::get('/quiz-generator', [quizController::class, 'index'])->name('quiz-generator');
Route::get('/quiz-generator/{module}/chapitres', [quizController::class, 'getChapitres'])->name('quiz-generator.chapitres');
Route::post('/quiz-generator/generate', [quizController::class, 'generate'])->name('quiz-generator.generate');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->middleware('Activite')
->name('home');

// -------------------------------------PROFESSEUR---------------------------------------------
Route::middleware(['auth', 'Activite', 'UserAccess:professeur'])->group(function () {
    Route::get("/professeur", [HomeController::class,'index']);
});

// -----------------------------------------MAINTENEUR-----------------------------------------------------------
Route::middleware(['auth', 'Activite', 'UserAccess:mainteneur'])->group(function () {
    Route::get("/mainteneur", [HomeController::class,'index']);
});

// -----------------------------ADMINISTRATEUR-----------------------------------------------------------
Route::middleware(['auth', 'Activite','UserAccess:administrateur'])->group(function () {
    Route::get("/administrateur", [HomeController::class,'index']);
});
// -----------------------------------PENDING------------------------------------------------------------

Route::get('/pending', function () {
    return view('pending');
})->middleware('PendingRest')->name('pending');
// // ----------------------------------------AUTHENTICATION RESTRICTION----------------------------------------
