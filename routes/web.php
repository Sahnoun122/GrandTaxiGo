<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\DisponibiliteController;
use App\Http\Controllers\PassagerController;


$_SESSION['user_id'] = 1;


Route::get('/chauffeur/index', [ChauffeurController::class, 'dashboard'])->name('chauffeur.index');

Route::get('/passager/index', [PassagerController::class, 'dashboard'])->name('passager.index');


// Route::POST('chauffeur.index' , [DisponibiliteController::class , 'index']);
// Route::POST('chauffeur.show' , [DisponibiliteController::class , 'index']);
// Route::POST('chauffeur.details' , [DisponibiliteController::class , 'index']);

Route::resource('chauffeur', DisponibiliteController::class); 

Route::get('chauffeur', [DisponibiliteController::class, 'index'])->name('chauffeur.index');



// Route::get('/passager/dashboard', [PassagerController::class, 'dashboard'])
//     ->middleware(['auth', 'role:passager'])
//     ->name('passager.dashboard');

// Route::get('/chauffeur/dashboard', [ChauffeurController::class, 'dashboard'])
//     ->middleware(['auth', 'role:chauffeur'])
//     ->name('chauffeur.dashboard');
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
