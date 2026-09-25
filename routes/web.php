<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);


/*
|--------------------------------------------------------------------------
| AUTENTICAÇÃO
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| ACERVO PÚBLICO
|--------------------------------------------------------------------------
*/

Route::get('/books', [BookController::class, 'index']);


/*
|--------------------------------------------------------------------------
| EMPRÉSTIMOS
|--------------------------------------------------------------------------
*/

// Solicitação de empréstimo
// Pode ser acessada por visitante.
// O LoanController decide se precisa mandar para login.
Route::post('/books/{book}/loan', [LoanController::class, 'store']);


// Tela de confirmação
// Só pode ser acessada por usuário autenticado.
Route::get('/books/{book}/loan/confirm', [LoanController::class, 'confirm'])
    ->middleware('auth')
    ->name('loans.confirm');


// Confirma efetivamente o empréstimo
Route::post('/books/{book}/loan/confirm', [LoanController::class, 'confirmLoan'])
    ->middleware('auth');


// Devolução
Route::put('/loans/{loan}/return', [LoanController::class, 'returnBook'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| USUÁRIO AUTENTICADO
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('profile');

    Route::put('/profile', [AuthController::class, 'updateProfile'])
        ->name('profile.update');

    Route::get('/settings', [AuthController::class, 'settings'])
        ->name('settings');
    
    Route::put('/settings/password', [AuthController::class, 'updatePassword'])
        ->name('settings.password.update');

});


/*
|--------------------------------------------------------------------------
| ADMINISTRADOR
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | CATEGORIAS
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/categories/create', [CategoryController::class, 'create']);

    Route::post('/categories', [CategoryController::class, 'store']);

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);

    Route::put('/categories/{category}', [CategoryController::class, 'update']);

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | LIVROS - ADMIN
    |--------------------------------------------------------------------------
    */

    // Rotas específicas antes de /books/{book}

    Route::get('/books/create', [BookController::class, 'create']);

    Route::post('/books', [BookController::class, 'store']);

    Route::get('/books/{book}/edit', [BookController::class, 'edit']);

    Route::put('/books/{book}', [BookController::class, 'update']);

    Route::delete('/books/{book}', [BookController::class, 'destroy']);

    Route::get('/admin/loans', [AdminController::class, 'loans'])
        ->name('admin.loans');

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| DETALHES DO LIVRO
|--------------------------------------------------------------------------
*/

// Deve ficar depois das rotas específicas de livros.
Route::get('/books/{book}', [BookController::class, 'show'])
    ->name('books.show');