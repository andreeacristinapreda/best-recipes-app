<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;

// Recipie entries routes

// display all
Route::get('/', [RecipeController::class, 'index']);

// display add
Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware('auth');

// store add
Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');

// display edit
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->middleware('auth');

// update
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->middleware('auth');

// delete
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->middleware('auth');

// Manage recipes
Route::get('/recipes/manage', [RecipeController::class, 'manage'])->middleware('auth');

// Toggle favourite icon on recipes
Route::post('/recipes/{recipe}/toggle-favorite', [RecipeController::class, 'toggleFavorite'])->middleware('auth');

// display one recipie
// keep after the other /recipe routes
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// Users routes

// display register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// add user
Route::post('/users', [UserController::class, 'store']);

// logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// display login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);