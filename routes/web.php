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

// display one recipie
// keep at the end of the code
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);