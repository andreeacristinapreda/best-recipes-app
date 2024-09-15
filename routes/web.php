<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Recipe;

// display all
Route::get('/', [RecipeController::class, 'index']);

// display add
Route::get('/recipes/create', [RecipeController::class, 'create']);

// store add
Route::post('/recipes', [RecipeController::class, 'store']);

// display edit
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit']);

// update
Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);

// delete
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);

// display one recipie
// keep at the end of the code
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);