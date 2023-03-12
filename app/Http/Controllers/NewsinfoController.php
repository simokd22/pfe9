<?php

namespace App\Http\Controllers;

use App\Models\Newsinfo;
use Illuminate\Http\Request;

class NewsinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Newsinfo::all();
        return view('admin.dashboard', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsinfo $newsinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return view('admin.edit',[
            'datafind'=>Newsinfo::findOrFail($id)
        ]);
        //
    }
    public function add(Request $request)
        {
      
        //return view('admin.add');
        $UpdateNews= new Newsinfo;
        $UpdateNews->News_name=$request->input('News_name');
        $UpdateNews->News_url=$request->input('News_url');
        $UpdateNews->News_category=$request->input('News_category');
        $UpdateNews->id_langue=$request->input('id_langue');
        $UpdateNews->save();
        $UpdateNews = Newsinfo::all();
        return redirect()->route('admin.dashboard');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $UpdateNews=Newsinfo::findOrFail($id);
        $UpdateNews->News_name=$request->input('News_name');
        $UpdateNews->News_url=$request->input('News_url');
        $UpdateNews->News_category=$request->input('News_category');
        $UpdateNews->id_langue=$request->input('id_langue');
        $UpdateNews->save();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsinfo $newsinfo)
    {
        //
    }
}
