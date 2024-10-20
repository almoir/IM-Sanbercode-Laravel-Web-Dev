<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BorrowsController;

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

Route::get("/table", function(){
    return view("pages.table");
});

Route::get("/data-tables", function(){
    return view("pages.data-tables");
});

// CRUD Route

Route::middleware(['auth'])->group(function () {
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

    // BORROWS
    Route::post('/borrows/{books_id}', [BorrowsController::class, 'store']);
});



// CRUD BOOKS
Route::resource('books', BooksController::class);

// AUTH
Auth::routes();

