<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return Recipe::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'ingredients' => 'required|array',
            'instructions' => 'required|string'
        ]);

         Recipe::create($request->all());

         return response()->json(['message' => 'Recipe created successfully'], 201);

    }

    public function show($id)
    {
        return Recipe::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->update($request->all());

         $recipe;
            return response()->json(['message' => 'Recipe updated successfully'], 201);
    }

    public function destroy($id)
    {
        Recipe::destroy($id);

        return response()->json(['message' => 'Recipe deleted successfully'], 200);
    }
}
