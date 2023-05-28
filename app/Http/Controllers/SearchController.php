<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Langue;
use App\Models\Newsinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;


class SearchController extends Controller
{
  public function index(Request $request)
    {
        $languages=Langue::all();
        $categories=Category::all();
        $sites=Newsinfo::all();
        return view('user.search', compact('languages','categories','sites'));  
        }
        public function sites()
        { 
          
          $sites=Newsinfo::all();
          return response()->json($sites);
        }
        public function langue()
        { 
          
          $languages=Langue::all();
          return response()->json($languages);
        }
    public function results(Request $request)
    {
        $data = $request->session()->get('data');
        //redirect('test/results');
        return view('user.results',['data'=>$data]);

    }
    public function search(Request $request)
    {
      //dd($request->all());
      $request->validate([
        'keyword'=>'required',
        'language'=>'required',
      ]);
        $key_word = $request->input('keyword');
        $date_start = $request->input('start-date');
        $date_end = $request->input('end-date');
        $Category = $request->input('categories'); 
        $sites=$request->input('sites'); 
        $langue=$request->input('language'); 
        $langue_id=Langue::where('langue','=',$langue)->pluck('id');
        $sites=Newsinfo::where('id_langue','=',$langue_id)->whereIn('News_name', $sites)->get();
        $categories='';
        if($Category){
        $categories=Category::where('id_langue','=',$langue_id)->whereIn('category_name', $Category)->get();
        }
        $data=ScrapController::handle($key_word,$date_start,$date_end,$sites,$categories);   
        $request->session()->put('data', $data);
        return redirect()->route('user.SearchResults');


    }
    public function show(Request $request,$news,$id)
    {
        $data = $request->session()->get('data');
        //$article=Controller::getArticle($data[$id]);
        return view('user.article',['data'=>$data,'news'=>$news,'id'=>$id]);
    }
    public function getSites(Request $request)
{
    $selectedLanguage = $request->query('language');
    
    // Retrieve the sites for the selected language from the database
    $sites = DB::table('newsinfos')
        ->join('langues', 'langues.id_langue', '=', 'newsinfos.id_langue')
        ->where('langues.langue', $selectedLanguage)
        ->pluck('newsinfos.News_name')
        ->toArray();
    
    return response()->json(['sites' => $sites]);
}

public function guessScrapElements(Request $request){
  $url=$request->input('url');
  $keyword=$request->input('keyword');
  /* $url=$request->input('News_url');
  $keyword='الحكومة'; */
  $data=ScrapController::guessScrapingElements($url,$keyword);
  $html = View::make('admin.guessedArticle', compact('data'))->render();
  return Response::json(['html' => $html]);
}
}