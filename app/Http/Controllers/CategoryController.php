<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = new Category;

        $category->fill($request->old());

        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $category = new Category;

        $category->fill($request->all());

        //Wenn Image übergeben wird
        if($request->hasFile('image')){
            $file = $request->file('image');
            //Assigned Name plus File extension in DB speichern
            $category->img_url = $file->getBasename() . '.' . $file->getClientOriginalExtension();
            //Image in Storage speichern
            Storage::putFileAs("category", $file, $category->img_url);
        }

        $category->save();

        return redirect()->route('categories.index', $category->id)->with('success', 'Kategorie wurde erstellt');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->authorize('edit', $category);

        $category->fill($request->old());

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, ['name' => 'required']);

        $this->authorize('update', $category);

        $category = new Category;

        $category->fill($request->old());


        $category->save();

        return redirect()->route('category.show', $category->id)->with('success', 'Kategorie wurde erstellt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategorie wurde gelöscht');
        
    }
}
