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

        if($request->hasFile('photo')) {
            // save in folder called photoes in /app/public
            $formFields['photo'] = $request->file('photo')->store('photoes', 'public');
        }

        Recipe::create($formFields);

        return redirect('/')->with('message', 'Recipe added successfully!');
    }

    // display edit form
    public function edit(Recipe $recipe) {
        return view('recipes.edit', [
          'recipe' => $recipe
        ]);
    }

    // update
    public function update(Request $request, Recipe $recipe) {
        $formFields = $request->validate([
            //field => ['required', Rule::unique('table-name', 'field-name')],
            'title' => 'required',
            'tags' => 'required',
            'short_description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'duration' => ['required', 'integer'],
        ]);

        if($request->hasFile('photo')) {
            // save in folder called photoes in /app/public
            $formFields['photo'] = $request->file('photo')->store('photoes', 'public');
        }

        $recipe->update($formFields);

        return back()->with('message', 'Recipe updated successfully!');
    }

    // delete
    public function destroy(Recipe $recipe) {
        $recipe->delete();
        return redirect('/')->with('message', 'Recipe deleted successfully!');
    }
}
