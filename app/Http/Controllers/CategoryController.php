<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $StoreCategory= new Category;
        $StoreCategory->category_name=$request->input('Categorie');
        $StoreCategory->synonyms_categories	=$request->input('stored_Synonym_category');
        $selectedLangue = $request->input('id_langue');
        $StoreCategory->id_langue = $selectedLangue;
        $StoreCategory->save();
        return redirect()->route('Categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.edit_category',[
            'datafind'=>Category::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $UpdateCategory= Category::findOrFail($id);
        $UpdateCategory->category_name=$request->input('Categorie');
        $UpdateCategory->synonyms_categories=$request->input('stored_Synonym_category');
        $selectedLangue = $request->input('id_langue');
        $UpdateCategory->id_langue = $selectedLangue;
        $UpdateCategory->save();
        return redirect()->route('Categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $DeleteNews=Category::findOrFail($id);
        $DeleteNews->delete();
        return redirect()->route('Categories.index');
    }
}
