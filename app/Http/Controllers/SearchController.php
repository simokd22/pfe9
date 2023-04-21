<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        {
            $keyword = $request->input('keyword');
            $category = $request->input('category');
            $language = $request->input('language');
            $name_site = $request->input('name_site');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // do something with the search parameters
            
            return view('user.search', compact('keyword', 'category', 'language', 'name_site', 'start_date', 'end_date'));

        }
        

    }
}
