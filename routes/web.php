<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Recipe;

Route::get('/', function () {
    return view('recipes', [
      'heading' => 'Recipes',
      'recipes' => Recipe::all()
    ]);
});

// one recipie
Route::get('/recipes/{recipe}', function (Recipe $recipe) {
  return view('recipe', [
    'recipe' => $recipe
  ]);
});