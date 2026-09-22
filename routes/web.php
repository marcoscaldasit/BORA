<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

/****************HOMEPAGE****************/
Route::get('/bora', [HomeController::class, 'index']);
/****************HOMEPAGE****************/


/****************CATEGORIAS****************/
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
/****************CATEGORIAS****************/


/****************LIVROS****************/
/* Página inicial */
Route::get('/books', [BookController::class, 'index']);

/* Criar */
Route::get('/books/create', [BookController::class, 'create']);

Route::post('/books', [BookController::class, 'store']);
/* Editar */
Route::get('/books/{book}/edit', [BookController::class, 'edit']);

/* Atualizar */
Route::put('/books/{book}', [BookController::class, 'update']);

/* Excluir */
Route::delete('/books/{book}', [BookController::class, 'destroy']);

/* Visualizar */
Route::get('/books/{book}', [BookController::class, 'show']);

/****************LIVROS****************/


/****************AUTENTICAÇÃO****************/
/* Cadastro */
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
/* Login */
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
/****************AUTENTICAÇÃO****************/
