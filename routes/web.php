<?php

<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
=======
use App\Http\Controllers\questionController;
use App\Http\Controllers\reponseController;

>>>>>>> b7f153e4adc74e622dd2e386dcc75f226ee441b5
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chapitreController;
use App\Http\Controllers\moduleController;

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
<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//route that shows chapiters list
Route::resource('chapitre' ,chapitreController::class);
//route that shows modules liste
Route::resource('module' ,moduleController::class);
=======

Route::resources([
    'question' => questionController::class,
    'reponse' => reponseController::class,
    'chapitre' => chapitreController::class,
    'module' =>moduleController::class
]);
>>>>>>> b7f153e4adc74e622dd2e386dcc75f226ee441b5
