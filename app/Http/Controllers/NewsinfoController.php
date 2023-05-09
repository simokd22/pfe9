<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
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
        return view('admin.news', compact('data'));
        //
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $StoreNews= new Newsinfo;
        $StoreNews->News_name=$request->input('News_name');
        $StoreNews->News_url=$request->input('News_url');
        $StoreNews->News_category=$request->input('News_category');
        $StoreNews->id_langue=$request->input('id_langue');
        $StoreNews->News_image=$request->input('News_image');
        $StoreNews->News_title=$request->input('News_title');
        $StoreNews->News_content=$request->input('News_content');
        $StoreNews->News_date=$request->input('News_date');
        $StoreNews->save();
        return redirect()->route('news.index');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $UpdateNews=Newsinfo::findOrFail($id);
        $UpdateNews->News_name=$request->input('News_name');
        $UpdateNews->News_url=$request->input('News_url');
        $UpdateNews->News_category=$request->input('News_category');
        $UpdateNews->News_title=$request->input('News_title');
        $UpdateNews->News_image=$request->input('News_image');
        $UpdateNews->News_content=$request->input('News_content');
        $UpdateNews->News_date=$request->input('News_date');
        $UpdateNews->id_langue=$request->input('id_langue');
        $UpdateNews->save();

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $DeleteNews=Newsinfo::findOrFail($id);
        $DeleteNews->delete();
        return redirect()->route('news.index');
    }
}
