<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\reponseController;
use App\Http\Controllers\PersonnalController;
use App\Http\Controllers\manageUser;
use App\Http\Middleware\UserAcces;
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
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/user', [manageUser::class, 'index']);
    Route::post('/user', [manageUser::class, 'store'])->name('store');
});

Route::resources([
    'question' => questionController::class,
    'reponse' => reponseController::class,
    'chapitre' => chapitreController::class,
    'module' =>moduleController::class
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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
    
