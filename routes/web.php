<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    // Route::get('/', [DossierController::class, 'index']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/product/{product}/details', [ProductController::class, 'show']);
    Route::get('/product/add', [ProductController::class, 'create']);
    Route::post('/add-product', [ProductController::class, 'store']);
    Route::get('/product/{product}/edit', [ProductController::class, 'edit']);
    Route::post('/edit-product/{product}', [ProductController::class, 'update']);
    Route::post('/delete-product/{product}', [ProductController::class, 'destroy']);


    Route::get('/agents', [AgentController::class, 'index']);
    // Route::get('/agent/{agent}/details', [AgentController::class, 'show']);
    Route::get('/agent/add', [AgentController::class, 'create']);
    Route::post('/add-agent', [AgentController::class, 'store']);
    // Route::get('/agent/{agent}/edit', [AgentController::class, 'edit']);
    // Route::post('/edit-agent/{agent}', [AgentController::class, 'update']);
    // Route::post('/delete-agent/{agent}', [AgentController::class, 'destroy']);


    // Route::get('/dossiers', [DossierController::class, 'index']);
    // Route::get('/dossier/{dossier}/details', [DossierController::class, 'show']);
    // Route::get('/dossier/add', [DossierController::class, 'create']);
    // Route::post('/add-dossier', [DossierController::class, 'store']);
    // Route::get('/dossier/{dossier}/edit', [DossierController::class, 'edit']);
    // Route::post('/edit-dossier/{dossier}', [DossierController::class, 'update']);
    // Route::post('/delete-dossier/{dossier}', [DossierController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
