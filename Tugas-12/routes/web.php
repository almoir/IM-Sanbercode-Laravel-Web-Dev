<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', [DashboardController::class, 'home']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/welcome', [AuthController::class, 'submit']);

Route::get("/table", function(){
    return view("pages.table");
});

Route::get("/data-tables", function(){
    return view("pages.data-tables");
});

// CRUD Route

// CREATE DATA
// Create Category
Route::get('/category/create', [CategoriesController::class, 'create']);
// Store Category
Route::post('/category', [CategoriesController::class, 'store']);

// READ DATA
// Show all
Route::get('category', [CategoriesController::class, 'index']);
// Show detail by id
Route::get('/category/{id}', [CategoriesController::class, 'detail']);

// UPDATE DATA
// Edit category by id
Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
// Update data on DB
Route::put('/category/{id}', [CategoriesController::class, 'update']);

// DELETE DATA
// Delete category by id
Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);