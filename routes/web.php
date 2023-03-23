<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Voiture;
use App\Models\Location;

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

Route::get('/', [VoitureController::class, 'home']);
Route::get('/voiture-dispo', [VoitureController::class, 'voituredispo']);
Route::get('/detail-voiture/{id}', [VoitureController::class, 'detailvoiture']);



Route::get('/dashboard', function () {
        $nloca = Location::count();
        $nuser = User::select()
            ->count();
        $nvoi = Voiture::select()
            ->where('location', 0)
            ->count();
        $nlou = Voiture::select()
            ->where('location', 1)
            ->count();

        return view("admin.home")
        ->with('nloca', $nloca)
        ->with('nuser', $nuser)
        ->with('nvoi', $nvoi)
        ->with('nlou', $nlou);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/logout', [Controller::class, 'logout'])->name('logout');

    Route::get('/addvoiture', [VoitureController::class, 'addvoiture']);
    Route::get('/voitures', [VoitureController::class, 'voitures']);
    Route::get('/users', [VoitureController::class, 'users']);
    Route::get('/voitures', [VoitureController::class, 'voitures']);
    Route::get('/locations', [VoitureController::class, 'locations']);

    Route::post('/savevoiture', [VoitureController::class, 'savevoiture']);
    Route::get('/editvoiture/{id}', [VoitureController::class, 'editvoiture']);
    Route::post('/updatevoiture', [VoitureController::class, 'updatevoiture']);
    Route::get('/deletevoiture/{id}', [VoitureController::class, 'deletevoiture']);
    Route::get('/locations', [VoitureController::class, 'locations']);

    Route::get('/louer/{id}', [VoitureController::class, 'louer']);
    Route::get('/rendre/{id}', [VoitureController::class, 'rendre']);
    Route::get('/mes-locations', [VoitureController::class, 'meslocations']);






    





    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
