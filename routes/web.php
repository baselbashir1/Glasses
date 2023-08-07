<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/get-agent-category/{id}', [HomeController::class, 'getAgentCategory']);
    Route::get('/get-product-type/{id}', [HomeController::class, 'getProductType']);
    Route::get('/get-product-price/{id}', [HomeController::class, 'getProductPrice']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/product/{product}/details', [ProductController::class, 'show']);
    Route::get('/product/add', [ProductController::class, 'create']);
    Route::post('/add-product', [ProductController::class, 'store']);
    Route::get('/product/{product}/edit', [ProductController::class, 'edit']);
    Route::post('/edit-product/{product}', [ProductController::class, 'update']);
    Route::post('/edit-product/{product}/{lensesGrade}', [ProductController::class, 'update']);
    Route::post('/delete-product/{product}', [ProductController::class, 'destroy']);

    Route::get('/agents', [AgentController::class, 'index']);
    Route::get('/agent/add', [AgentController::class, 'create']);
    Route::post('/add-agent', [AgentController::class, 'store']);
    Route::get('/agent/{agent}/edit', [AgentController::class, 'edit']);
    Route::post('/edit-agent/{agent}', [AgentController::class, 'update']);
    Route::post('/delete-agent/{agent}', [AgentController::class, 'destroy']);

    Route::get('/dossiers', [DossierController::class, 'index']);
    Route::get('/dossier/{dossier}/details', [DossierController::class, 'show']);
    Route::get('/dossier/add', [DossierController::class, 'create']);
    Route::post('/add-dossier', [DossierController::class, 'store']);
    Route::get('/dossier/{dossier}/edit', [DossierController::class, 'edit']);
    Route::post('/edit-dossier/{dossier}', [DossierController::class, 'update']);
    Route::post('/delete-dossier/{dossier}', [DossierController::class, 'destroy']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{user}/details', [UserController::class, 'show']);
    Route::get('/user/add', [UserController::class, 'create']);
    Route::post('/add-user', [UserController::class, 'store']);
    Route::get('/user/{user}/edit', [UserController::class, 'edit']);
    Route::post('/edit-user/{user}', [UserController::class, 'update']);
    Route::post('/delete-user/{user}', [UserController::class, 'destroy']);

    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoice/{invoice}/details', [InvoiceController::class, 'show']);
    Route::get('/dossier/{dossier}/invoice/add', [InvoiceController::class, 'create']);
    Route::post('/dossier/{dossier}/add-invoice', [InvoiceController::class, 'store']);
    Route::get('/dossier/{dossier}/invoice/{invoice}/edit', [InvoiceController::class, 'edit']);
    Route::post('/dossier/{dossier}/edit-invoice/{invoice}', [InvoiceController::class, 'update']);
    Route::post('/dossier/{dossier}/delete-invoice/{invoice}', [InvoiceController::class, 'destroy']);

    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/role/{role}/details', [RoleController::class, 'show']);
    Route::get('/role/add', [RoleController::class, 'create']);
    Route::post('/add-role', [RoleController::class, 'store']);
    Route::get('/role/{role}/edit', [RoleController::class, 'edit']);
    Route::post('/edit-role/{role}', [RoleController::class, 'update']);
    Route::post('/delete-role/{role}', [RoleController::class, 'destroy']);
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
