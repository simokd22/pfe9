<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Langue::all();
        return view('admin.langue', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.add_langue');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $StoreLangue= new Langue;
        $StoreLangue->langue=$request->input('langue');
        $StoreLangue->save();
        return redirect()->route('langues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Langue $langue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.edit_langue',[
            'datafind'=>Langue::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $UpdateLangue= Langue::findOrFail($id);
        $UpdateLangue->langue=$request->input('langue');
        $UpdateLangue->save();
        return redirect()->route('langues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $DeleteLangue=Langue::findOrFail($id);
        $DeleteLangue->delete();
        return redirect()->route('langues.index');
    }
}
