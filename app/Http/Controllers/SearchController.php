<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function send(Request $request){
        $value=$request->input('keyword');
         return redirect()->route('/user/search')->with('value' , $value);
    }
}
