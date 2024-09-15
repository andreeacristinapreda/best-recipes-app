<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        return view('recipes.index', [
         'recipes' => Recipe::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // only one recipe
    public function show(Recipe $recipe) {
        return view('recipes.show', [
          'recipe' => $recipe
        ]);
    }

    // add form
    public function create() {
        return view('recipes.create');
    }

    // store
    public function store(Request $request) {
        $formFields = $request->validate([
            //field => ['required', Rule::unique('table-name', 'field-name')],
            'title' => 'required',
            'tags' => 'required',
            'short_description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'duration' => ['required', 'integer'],
        ]);

        Recipe::create($formFields);

        return redirect('/')->with('message', 'Recipe added successfully!');
    }
}
