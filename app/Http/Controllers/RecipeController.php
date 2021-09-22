<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $recipe = new Recipe;

        $recipe->fill($request->old());

        $categories = Category::all();

        return view('recipes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
        ]);

        $recipe = new Recipe;

        $recipe->fill($request->all());

        //Wenn Image übergeben wird
        if($request->hasFile('image')){
            $file = $request->file('image');
            //Assigned Name plus File extension in DB speichern
            $recipe->image_url = $file->getBasename() . '.' . $file->getClientOriginalExtension();
            //Image in Storage speichern
            Storage::putFileAs("recipes", $file, $recipe->image_url);
        }

        $recipe->user_id = Auth::user()->id;

        $recipe->ingredients = json_encode($request->ingredient);
        $recipe->steps = json_encode($request->step);

        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'Rezept wurder erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->ingredients = json_decode($recipe->ingredients);
        $recipe->steps = json_decode($recipe->steps);        

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $this->authorize('edit', $recipe);

        $recipe->ingredients = json_decode($recipe->ingredients);
        $recipe->steps = json_decode($recipe->steps);  

        $categories = Category::all();
  

        return view('recipes.edit', compact('recipe'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $recipe = Recipe::findOrFail($id);

        $this->authorize('update', $recipe);

        $recipe->fill($request->all());

        $recipe->category = $request->category;

        //Wenn Image übergeben wird
        if($request->hasFile('image')){
            $file = $request->file('image');
            //Assigned Name plus File extension in DB speichern
            $recipe->image_url = $file->getBasename() . '.' . $file->getClientOriginalExtension();
            //Image in Storage speichern
            Storage::putFileAs("recipes", $file, $recipe->image_url);
        }else{
            $recipe->image_url = $recipe->image_url;
        }

        $recipe->save();

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Rezept wurde bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Rezept wurde gelöscht.');
    }

    public function latestRecipes()
    {
        $recipes = Recipe::query()->latest()->get();

        return view('recipes.latest', compact('recipes'));
    }

    public function categorized($categoryId)
    {

        $recipes = Recipe::query()->where('category', $categoryId)->get();

        return view('recipes.categorized', compact('recipes'));
    }

    public function search(Request $request)
    {
        $keywords = $request->searchbar;
        $recipes = Recipe::search($keywords)->get();

        return view('recipes.search', compact('recipes'));
    }
    
}
