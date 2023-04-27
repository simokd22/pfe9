<?php

namespace App\Http\Controllers;
set_time_limit(0);


use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;

use GuzzleHttp\Pool;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;


//use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use IntlDateFormatter;
use Symfony\Component\DomCrawler\Crawler;

class ScrapController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     *
     */


public function getArticle($articles){
    $urls = [
        [
            'language'=>'ar',
            'name'=>'hespress',
            'url'=>"https://www.hespress.com/",
            'section'=>'.cat',
            'img'=>'img',
            'articles'=>'.search_results > div',
            'title'=>'.card-title',
            'content'=>'.article-content > p',
            'date'=>'.date-card',
            'search'=>'?s',
            'date_format'=>'',
          ],
      /*  [
            'language'=>'ar',
            'name'=>'alakhbar',
            'url'=>"https://www.alakhbar.press.ma/",
            'section'=>'.current-post-parent ',
            'articles'=>'.posts-items > .post-item',
            'img'=>'img',
            'title'=>'.post-title',
            'content'=>'.entry-content > p',
            'date'=>' .post-meta > .date',
            'search'=>'?s',
            'date_format'=>'',
          ],
      [
        'language'=>'ar',
        'name'=>'goud',
        'url'=>"https://www.goud.ma/",
        'section'=>'.cat-link',
        'articles'=>'.col-md-6 > article > .first-content > a',
        'img'=>'.content > img',
        'title'=>'.col-md-12 > h1',
        'content'=>'.content > p',
        'date'=>' .date',
        'search'=>'?s',
        'date_format'=>'d/m/Y H:i',
      ],

     [
            'language'=>'ar',
            'name'=>'al3omk',
            'url'=>"https://al3omk.com/",
            'section'=>'.post-cat > a',
            'img'=>'img',
            'articles'=>'.vcard-thumb',
            'title'=>'.post-single > .post-title',
            'content'=>'.post-single > .post-body > p',
            'date'=>'.post-date',
            'search'=>'?s',
            'date_format'=>'',
          ],
           [
        'language'=>'ar',
        'name'=>'hibapress',
        'section'=>'.menu > .tie-current-menu',
        'url'=>"https://ar.hibapress.com/",
        'articles'=>'.post-item > .post-thumb',
        'img'=>'img',
        'title'=>'.post-title',
        'content'=>'.entry-content > p',
        'date'=>' .date',
        'search'=>'?s',
      ],
     [
        'language'=>'ar',
        'name'=>'almassaa',
        'url'=>"https://almassaa.com/",
        'section'=>'.post-cat-wrap > a',
        'img'=>'img',
        'articles'=>'.post-item > .post-thumb',
        'title'=>'.post-title',
        'content'=>'.entry-content >  p',
        'date'=>'.date ',
        'search'=>'?s',
      ],
     [
        'language'=>'ar',
        'name'=>'alyaoum24',
        'url'=>"https://alyaoum24.com/",
        'section'=>'.breadcrumb >  li:last-child',
        'img'=>'img',
        'articles'=>'.listing-archive .article-image > a',
        'title'=>'.infoSingle > h1',
        'content'=>'.post_content > p',
        'date'=>'.timePost',
        'search'=>'?s',
      ],
       [
        'language'=>'ar',
        'name'=>'almaghribia',
        'url'=>"https://www.almaghribia.ma/",
        'section'=>'.main-title',
        'img'=>'.img-thumbnail',
        'articles'=>'.list-view .col-sm-12 >  a',
        'title'=>'.sec-info > h1',
        'content'=>'.article > p',
        'date'=>'.time',
        'search'=>'resultat?keyword',
      ],

    [
        'language'=>'ar',
        'name'=>'barlamane',
        'url'=>"https://www.barlamane.com/",
        'section'=>'.current-post-parent',
        'img'=>'.wp-post-image',
        'articles'=>'.posts > .post > a',
        'title'=>'.post-content > .title',
        'content'=>'.content > p',
        'date'=>'.date',
        'search'=>'?s',
      ],

    [
        'language'=>'ar',
        'name'=>'tanja24',
        'url'=>"https://tanja24.com/",
        'section'=>'.current-post-parent > a',
        'img'=>'.post-thumbnail > img',
        'articles'=>'.listing > article  .img-holder',
        'title'=>'.single-post-title',
        'content'=>'.entry-content > p',
        'date'=>'.post-published > b',
        'search'=>'?s',
      ],
    */
    /*
      [
        'language'=>'fr',
        'name'=>'hespress',
        'url'=>"https://fr.hespress.com/",
        'section'=>'.breadcrumb > li:last-child',
        'img'=>'.img-fluid',
        'articles'=>'.search_results > div',
        'title'=>'.post-title',
        'content'=>'.article-content > p',
        'date'=>'.date-post',
        'search'=>'?s',
      ],
      ['language'=>'fr',
      'name'=>'al3omk',
      'url'=>"https://fr.al3omk.com/",
      'section'=>'.current-post-parent',
      'img'=>'.lg-big-image > img',
      'articles'=>'.search-item',
      'title'=>'.title-single',
      'content'=>'.post_content > p',
      'date'=>'.timePost',
      'search'=>'?s',
    ],
    [
        'language'=>'fr',
        'name'=>'hibapress',
        'section'=>'.current-post-parent ',
        'url'=>"https://fr.hibapress.com/",
        'articles'=>'#posts-container > li',
        'img'=>'.wp-post-image',
        'title'=>'.post-title',
        'content'=>'.entry-content > p',
        'date'=>' .date',
        'search'=>'?s',
      ],
      [
        'language'=>'fr',
        'name'=>'alyaoum24',
        'url'=>"https://fr.alyaoum24.com/",
        'section'=>'.current-post-parent > a',
        'img'=>'.imagePostArchive > a > img',
        'articles'=>'.listing-archive  li',
        'title'=>'.infoSingle > h1',
        'content'=>'.post_content > p',
        'date'=>'.timePost',
        'search'=>'?s',
      ],
       [
      'language'=>'fr',
        'name'=>'barlamane',
        'url'=>"https://www.barlamane.com/fr/",
        'section'=>'.breadcrumbs > a:last-child',
        'img'=>'.wp-post-image',
        'articles'=>'.posts-list > article',
        'title'=>'.entry-header > .entry-title',
        'content'=>'.entry-content > p',
        'date'=>'.entry-date',
        'search'=>'?s',
      ],
      */


    ];

$client = new Client;
try {
    $response = $client->get($articles['url']);
    $crawler = new Crawler($response->getBody()->getContents()) ;
    $content = $crawler->filter($urls[$articles['id']]['content']);
    $paragraphs=[];
    for ($i = 0; $i < count($content);$i++){
    $paragraphs[]= $content->eq($i)->text();
    }
    /*try{
        $secttionName=$crawler->filter($urls[$articles['id']]['section'])->text();
    }
    catch(Exception $e){
        $secttionName='';
    }
    $article['category'] = $secttionName;*/
    $article['category'] = $articles['category'];
    $article['title']    = $articles['title'];
    $article['text']     = $paragraphs;
    $article['date']     = $articles['date'];
    $article['image']    = $articles['image'];
} catch (Exception $e) {
}
    return $article;
}

public function translateDate($input,$format='') {
    if($format!==''){
        try {
            return Carbon::createFromFormat($format, $input);
          } catch (Exception $e) {
            // do nothing, just try the next format
          }
      }
      else{
        $day = 1;
        $year=0;
        $month=0;
        $time = null;
        $period = null;
        $periods = ['قبل' => 'ago','منذ' => 'ago','مند' => 'ago',];
        $matches_day = preg_match('/\b\d{1,2}\b/', $input, $number);
        if ($matches_day) {
            $day = $number[0];
        }
        if (str_replace(array_keys($periods), array_values($periods), $input) !== $input) {
            $period = 'ago';
            $days = ['يوم' => 'days','ايام' => 'days','أيام'=> 'days','jour'=> 'days','jours'=> 'days'];
            $weeks = ['اسبوع' => 'week','أسبوع' => 'week','اسابيع' => 'weeks','أسابيع' => 'weeks','Semaine'=> 'weeks'];
            if (str_replace(array_keys($days), array_values($days), $input) !== $input) {

                if(str_contains($input,'يومين') || str_contains($input,'يومان')){
                    $day = '';
                    $time = '2 days';
                }else{
                    $time = 'days';
                }
            } elseif (str_replace(array_keys($weeks), array_values($weeks), $input) !== $input) {

                if(str_contains($input,'اسبوعين') || str_contains($input,'أسبوعين') || str_contains($input,'أسبوعان') || str_contains($input,'اسبوعان') ){
                    $day = '';
                    $time = '2 weeks';
                }else{
                    $time = 'weeks';
                }
            }
            else{
                return Carbon::now();
            }
            return Carbon::parse($day.' '.$time.' '.$period) ;
        }
        else{
            $matches_year = preg_match('/\b\d{4}\b/', $input, $number);
            if($matches_year){
            $year= $number[0];
            }
            $months1 = [
                "يناير" => "01",
                "فبراير" => "02",
                "مارس" => "03",
                "ابريل" => "04",
                "أبريل" => "04",
                "مايو" => "05",
                "يونيو" => "06",
                "يوليو" => "07",
                "أغسطس" => "08",
                "اغسطس" => "08",
                "سبتمبر" => "09",
                "أكتوبر" => "10",
                "اكتوبر" => "10",
                "نوفمبر" => "11",
                "ديسمبر" => "12",
                "janvier" => "1",
                "février" => "2",
                "fevrier" => "2",
                "mars" => "3",
                "avril" => "4",
                "mai" => "5",
                "juin" => "6",
                "juillet" => "7",
                "août" => "8",
                "aout" => "8",
                "septembre" => "9",
                "octobre" => "10",
                "novembre" => "11",
                "décembre" => "12",
                "decembre" => "12",
            ];
            foreach($months1 as $key=>$value){
                if(str_contains($input,$key)){
                    $month = $value;
                }
            }
            return Carbon::create($year,$month,$day);
        }
}
}

//,$start_date,$end_date
public function compare_category($scraped_cat,$in_cat){
    $isTrue = false;
    if($in_cat=='all' ){
        $isTrue = true;
    }
    else{
    $categories=[
        'رياضة'=>['رياضة','الرياضة','سبور','الرياضي'],
        'سياسة'=>['سياسة','سياسية','وطنية'],
        'مجتمع'=>['مجتمع',],
        'اقتصاد'=>['اقتصاد','إقتصاد','مال وأعمال'],
    ];

    foreach ($categories[$in_cat] as $value) {

        if (str_contains($scraped_cat, $value)) {
            $isTrue = true;
            break;
        }
    }
    }


    return $isTrue;
}

public function compare_date($urls,$key_word,$date_start,$date_end){
    $searchUrl='';
if(!empty($date_start) && !empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls['url'])
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));
}
else if(empty($date_start) && !empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls['url'])
       . '&tbs=cdr%3A1%2Ccd_min%3A'. '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));
}
else if(!empty($date_start) && empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls['url'])
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A';
}
else{
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls['url'])
    . '&tbs=0';
}
        return $searchUrl;
}
public static function handle(String $key_word,$date_start='',$date_end='',String $Category=''){
    $instance=new self;

$urls = [
    [
        'language'=>'ar',
        'name'=>'alyaoum24',
        'url'=>"https://alyaoum24.com/",
        'section'=>'.breadcrumb >  li:last-child',
        'img'=>'.wp-post-image',
        'title'=>'.infoSingle > h1',
        'content'=>'.post_content > p',
        'date'=>'.timePost',

      ],
   [
        'language'=>'ar',
        'name'=>'tanja24',
        'url'=>"https://tanja24.com/",
        'section'=>'.current-post-parent > a',
        'img'=>'.post-thumbnail > img',
        'title'=>'.single-post-title',
        'content'=>'.entry-content > p',
        'date'=>'.post-published > b',
      ],
   [
        'language'=>'ar',
        'name'=>'barlamane',
        'url'=>"https://www.barlamane.com/",
        'section'=>'.current-post-parent:not(.menu-item-has-children) > a',
        'img'=>'div.thumb > img',
        'title'=>'.post-content > .title',
        'content'=>'.content > p',
        'date'=>'.date',
      ],
   [
        'language'=>'ar',
        'name'=>'assahraa',
        'url'=>"https://assahraa.ma/",
        'section'=>'.main-title',
        'img'=>'.img-thumbnail',
        'title'=>'.sec-info > h1',
        'content'=>'.article > p',
        'date'=>'.time',

      ],
     [
        'language'=>'ar',
        'name'=>'almassaa',
        'url'=>"https://almassaa.com/",
        'section'=>'.menu > .current-post-ancestor',
        'img'=>'.single-featured-image > img',
        'title'=>'.post-title',
        'content'=>'.entry-content >  p',
        'date'=>'.date ',
      ],
   /* [
        'language'=>'ar',
        'name'=>'hibapress',
        'section'=>'.menu > .current-post-ancestor',
        'url'=>"https://ar.hibapress.com/",
        'img'=>'.featured-area-inner  img',
        'title'=>'.post-title',
        'content'=>'.entry-content > p',
        'date'=>' .date',
      ],
   [
        'language'=>'ar',
        'name'=>'goud',
        'url'=>"https://www.goud.ma/",
        'section'=>'.cat-link',
        'img'=>'.content > img',
        'title'=>'.col-md-12 > h1',
        'content'=>'.content > p',
        'date'=>' .date',
     ],
     [
        'language'=>'ar',
        'name'=>'al3omk',
        'url'=>"https://al3omk.com/",
        'section'=>'.post-cat > a',
        'img'=>'.post-image > img',
        'title'=>'.post-title',
        'content'=>'.post-body > p',
        'date'=>'.post-date',
      ],
   [
        'language'=>'ar',
        'name'=>'alakhbar',
        'url'=>"https://www.alakhbar.press.ma/",
        'section'=>'.post-cat-wrap > a:last-child',
        'img'=>'.featured-area-inner  img',
        'title'=>'.post-title',
        'content'=>'.entry-content > p',
        'date'=>' .post-meta > .date',
      ],







    [
        'language'=>'ar',
        'name'=>'hespress',
        'url'=>"https://www.hespress.com/",
        'section'=>'.breadcrumb > li:last-child',
        'img'=>'.ratio-medium > img',
        'title'=>'.post-title',
        'content'=>'.article-content > p',
        'date'=>'.date-post',
      ],
      */
/*
  [
    'language'=>'fr',
    'name'=>'hespress',
    'url'=>"https://fr.hespress.com/",
    'section'=>'.breadcrumb > li:last-child',
    'img'=>'.img-fluid',
    'articles'=>'.search_results > div',
    'title'=>'.post-title',
    'content'=>'.article-content > p',
    'date'=>'.date-post',
    'search'=>'?s',
  ],
  ['language'=>'fr',
  'name'=>'al3omk',
  'url'=>"https://fr.al3omk.com/",
  'section'=>'.current-post-parent',
  'img'=>'.lg-big-image > img',
  'articles'=>'.search-item',
  'title'=>'.title-single',
  'content'=>'.post_content > p',
  'date'=>'.timePost',
  'search'=>'?s',
],
[
    'language'=>'fr',
    'name'=>'hibapress',
    'section'=>'.current-post-parent ',
    'url'=>"https://fr.hibapress.com/",
    'articles'=>'#posts-container > li',
    'img'=>'.wp-post-image',
    'title'=>'.post-title',
    'content'=>'.entry-content > p',
    'date'=>' .date',
    'search'=>'?s',
  ],
  [
    'language'=>'fr',
    'name'=>'alyaoum24',
    'url'=>"https://fr.alyaoum24.com/",
    'section'=>'.current-post-parent > a',
    'img'=>'.imagePostArchive > a > img',
    'articles'=>'.listing-archive  li',
    'title'=>'.infoSingle > h1',
    'content'=>'.post_content > p',
    'date'=>'.timePost',
    'search'=>'?s',
  ],
   [
  'language'=>'fr',
    'name'=>'barlamane',
    'url'=>"https://www.barlamane.com/fr/",
    'section'=>'.breadcrumbs > a:last-child',
    'img'=>'.wp-post-image',
    'articles'=>'.posts-list > article',
    'title'=>'.entry-header > .entry-title',
    'content'=>'.entry-content > p',
    'date'=>'.entry-date',
    'search'=>'?s',
  ],
  */


];
//$instance= new self;
//dd(Carbon::parse($instance->translateDate('منذ 3 أيام'))->format('Y-m-d'));
        //dd($urls);
        global $data;
        global $links;
        global $searchResults;
/*$requests = function($urls)use($key_word) {
            for ($i = 0;$i<count($urls);$i++){
                //$req=new Request('GET', $urls[$i]['url']);
                //$this->getUrls($urls[$i]['url'],1,$key_word)
                yield new Request('GET', $urls[$i]['url']);
            }
};*/


$userAgents = [
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
    //'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
    'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0'
];
$client = new Client([
    'headers' => [
        'User-Agent' => $userAgents[array_rand($userAgents)],
        'Accept' => 'text/html',
        'Referer' => 'http://www.est-umi.ac.ma/'
    ],
    //'verify' => base_path('resources/cacert.pem')
]);

$requests = function ($urls){
    foreach($urls as $url) {
        yield new Request('GET', $url['url']);
}
};

$pool = new Pool($client, $requests($urls), [
    'concurrency' => 20,
    'fulfilled' => function (Response $response,$index) use ($urls, $Category,$key_word,$date_start,$date_end,$client) {
        global $searchResults;
        $instance=new self;
        $searchUrl=$instance->compare_date($urls[$index],$key_word,$date_start,$date_end);
        
        /*$searchUrl = 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls[$index]['url'])
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));*/
/*
       $resultsPerPage = 10;
    $numPages = 3;
    // Loop through each page of search results and retrieve them
    for ($page = 0; $page < $numPages; $page++) {
    // Calculate the start offset for this page
    $startOffset= $page * $resultsPerPage;
    // Add the start offset to the search URL query string
    $searchUrlWithOffset[$index][] = $searchUrl . '&start=' . $startOffset;
    }
    //dd($searchUrlWithOffset);
    $requests = function ($urls){
        foreach($urls as $url) {
            yield new Request('GET', $url);
    }};
$pool = new Pool($client, $requests($searchUrlWithOffset[$index]), [
    'concurrency' => 20,
    'fulfilled' => function (Response $response,$index2) use ($index,$urls,$client, $Category) {
        global $searchResults;
        //echo($response->getBody()->getContents());
        $crawler = new Crawler($response->getBody()->getContents());
        //echo($response->getBody()->getContents());

        $crawler->filter('.yuRUbf > a')->each(function ($node,$key)use($urls,$index2,$index){

            global $searchResults ;
            //dd($node->attr('href'));
                //echo($index2);
            $searchResults[$index][]=$node->attr('href');

        });

    },
    'rejected' => function (Exception $reason) {
        dd('error2');
},
]);
foreach ($pool as $index => $response) {
    sleep(2);
}
// Initiate the transfers and create a promise
$promise = $pool->promise();

// Force the pool of requests to complete.
$promise->wait();*/
global $searchResults,$data;
        //echo($response->getBody()->getContents());
        $response=$client->get($searchUrl);
        $crawler = new Crawler($response->getBody()->getContents());
        //echo($response->getBody()->getContents());
        $NumPages=$crawler->filter('.AaVjTc tr > td');

        $data[$urls[$index]['name']]['PagesNumber']=count($NumPages)-2;
        $crawler->filter('.yuRUbf > a')->each(function ($node,$key)use($urls,$index){

            global $searchResults ;
            //dd($node->attr('href'));
                //echo($index2);
            $searchResults[$index][]=$node->attr('href');

        });
$request = function ($urls)  {
    foreach($urls as $url) {
            yield new Request('GET', $url);
    }};

$pool = new Pool($client, $request($searchResults[$index]), [
    'concurrency' => 20,
    'fulfilled' => function (Response $response,$index3) use ($index,$urls, $Category,$key_word) {
        global $data;
        $instance=new self;
        try{
        $crawler = new Crawler($response->getBody()->getContents());
        $content = $crawler->filter($urls[$index]['content']);
        $paragraphs='';
        for ($i = 0; $i < count($content);$i++){
        $paragraphs.= $content->eq($i)->text() ." \n";
        }
        $title=$crawler->filter($urls[$index]['title'])->text();
        if(str_contains($title,$key_word) || str_contains($paragraphs,$key_word)){
            $scraped_category=$crawler->filter($urls[$index]['section'])->text();
                //echo($scraped_category. '<br>');
          //  if($instance->compare_category($scraped_category,$Category) ){ }
                $innerData['category'] =$scraped_category;
                $innerData['title']    = $title;
                $innerData['text']     = $paragraphs;
                $image=$crawler->filter($urls[$index]['img']);
                //dd($image->attr('src'));
                if(str_contains($image->attr('data-src'),'jpg') || str_contains($image->attr('data-src'),'webp') || str_contains($image->attr('data-src'),'jpeg')){
                    $imageUrl=$image->attr('data-src');
                }
                else{

                    $imageUrl=$image->attr('src');
                }

                if(str_contains($imageUrl,'https://') || str_contains($imageUrl,'http://')){
                $innerData['image']     =  $imageUrl;
                }
                else{
                $innerData['image']     =  $urls[$index]['url'] . $imageUrl;
                }
                 //$instance->translateDate()
                $innerData['date']    = $crawler->filter($urls[$index]['date'])->text();
                $data[$urls[$index]['name']][]=$innerData;
           
        }


    }catch(Exception $e){
       // echo();
    }
},
    'rejected' => function (Exception $reason,$index2){
        //dd('error'.$index2 .': '. $reason);
},
]);
foreach ($pool as $index => $response) {
    sleep(1);
}
$promise = $pool->promise();
// Force the pool of requests to complete.
$promise->wait();
        },
    'rejected' => function (Exception $reason,$index2){
                dd($reason);
        },
        ]);
    $promise = $pool->promise();
        // Force the pool of requests to complete.
    $promise->wait();
//dd($data);
//dd('done');


//usort($data, function ($a, $b) {return strtotime($b['date']) - strtotime($a['date']);});
return $data;
        //
        //return view('test',[
        //    'data'=>$data
        //]);
//dd();



}

}