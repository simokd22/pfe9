<?php

namespace App\Http\Controllers;
use GuzzleHttp\TransferStats;

set_time_limit(0);

use App\Models\Newsinfo;
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
public function compare_category($scraped_cat,$categories){
    $isTrue = false;
    if($categories=='' ){
        $isTrue = true;
    }
    else{
        foreach($categories as $category){
            foreach (json_decode($category->synonyms_categories) as $value) {
                if (str_contains($scraped_cat, $value)) {
                    $isTrue = true;
                    break;
                }
            }
        }
    
    }
    return $isTrue;
}

public function compare_date($urls,$key_word,$date_start,$date_end){
    $searchUrl='';
if(!empty($date_start) && !empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls->News_url)
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));
}
else if(empty($date_start) && !empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls->News_url)
       . '&tbs=cdr%3A1%2Ccd_min%3A'. '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));
}
else if(!empty($date_start) && empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls->News_url)
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A';
}
else{
    $searchUrl= 'https://www.google.com/search?q=intext:' . urlencode($key_word) .' OR intitle:'. urlencode($key_word) . ' site:'. urlencode($urls->News_url)
    . '&tbs=0';
}
        return $searchUrl;
}
public static function handle(String $key_word,$date_start='',$date_end='',$sites,$Category=''){
    $instance=new self;
  
/* $client = new Client();

// Make the HTTP request and retrieve the HTML response
//$response = $client->get('https://www.hespress.com/%d8%a3%d8%a8%d9%88-%d8%a8%d9%83%d8%b1-%d8%a7%d9%84%d8%ac%d8%a7%d9%85%d8%b9%d9%8a-%d8%b9%d9%86%d8%af%d9%85%d8%a7-%d9%8a%d8%aa%d8%ad%d9%88%d9%84-%d8%b5%d8%ad%d8%a7%d9%81%d9%8a-%d8%b3%d8%a7%d8%a8%d9%82-1175707.html');
$response = $client->get('https://www.alakhbar.press.ma/%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9-%D8%B7%D8%A7%D8%B1%D8%A6-%D9%84%D9%85%D8%AC%D9%84%D8%B3-%D8%A7%D9%84%D8%AD%D9%83%D9%88%D9%85%D8%A9-%D9%82%D8%A8%D9%84-%D8%A7%D9%86%D8%B9%D9%82%D8%A7%D8%AF-%D8%A7-212704.html');
// Create a new Crawler instance and load the HTML response body
$crawler = new Crawler($response->getBody()->getContents());

// Define the search string
//$searchString = 'أبو بكر الجامعي.. عندما يتحول صحافي سابق إلى لعبة بيد الدولة الفرنسية العميقة';
$searchString='اجتماع طارئ لمجلس الحكومة قبل انعقاد المجلس الوزاري';
// Find all elements containing the search string in their text content
$matchingElements = $crawler->filterXPath("//body//article[contains(., '$searchString')]");
//dd($matchingElements);

// Loop through the matching elements and extract their HTML
$result = [];
$matchingElements->each(function (Crawler $element) use (&$result) {
    $image=$element->filterXPath(".//img");
    $date=$element->filter("[class*='date'],[id*='date']");
    $content=$element->filterXPath(".//*[contains(@class, 'content') or contains(@id, 'content')]");
    $content=new Crawler($content->getNode(0)->parentNode);
    dd($content);
    dd($element->attr('class'));
    $parentNodeCrawler = new Crawler($element->getNode(0)->parentNode);
    $classAttribute = $parentNodeCrawler->attr('class');
    dd($classAttribute);
    $result[] = $element->attr('class');
});
dd($result); */
    $urls= $sites;
    //dd($sitesdata->get(0));
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
    //'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
    //'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
    'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0'
];
$client = new Client( [
    'headers' => [
        'User-Agent' => $userAgents[array_rand($userAgents)],
        'Accept' => 'text/html',
        'Referer' => 'http://www.est-umi.ac.ma/'
    ],
    'verify' => base_path('public/cacert.pem')
]); 

$requests = function ($urls){
    foreach($urls as $url) {
        yield new Request('GET', $url->News_url);
}
};

$pool = new Pool($client, $requests($urls), [
    'concurrency' => 20,
    'fulfilled' => function (Response $response,$index) use ($urls, $Category,$key_word,$date_start,$date_end,$client) {
        global $searchResults;
        $instance=new self;
        $searchUrl=$instance->compare_date($urls->get($index),$key_word,$date_start,$date_end);
        //dd($searchUrl);
global $searchResults,$data;
        //echo($response->getBody()->getContents());
        $response=$client->get($searchUrl);
        $crawler = new Crawler($response->getBody()->getContents());
        //echo($response->getBody()->getContents());
        $NumPages=$crawler->filter('.AaVjTc tr > td');
        $data[$urls->get($index)->News_name]['PagesNumber']=count($NumPages)-2;
        $crawler->filter('.yuRUbf > a')->each(function ($node,$key)use($urls,$index){
            //dd($node);
            global $searchResults ;
            //dd($node->attr('href'));
                //echo($index2);
            $searchResults[$index][]=$node->attr('href');

        });
$request = function ($urls)  {
    foreach($urls as $url) {
            yield new Request('GET', $url);
    }};
//dd($searchResults);
$pool = new Pool($client, $request($searchResults[$index]), [
    'concurrency' => 20,
    'fulfilled' => function (Response $response,$index3) use ($index,$urls, $Category,$key_word) {
        global $data;
        $instance=new self;
        try{
        $crawler = new Crawler($response->getBody()->getContents());
        $content = $crawler->filter($urls->get($index)->News_content);
        $paragraphs='';
        for ($i = 0; $i < count($content);$i++){
        $paragraphs.= $content->eq($i)->text() ." \n";
        }
        $title=$crawler->filter($urls->get($index)->News_title)->text();
        if(str_contains($title,$key_word) || str_contains($paragraphs,$key_word)){
            $scraped_category=$crawler->filter($urls->get($index)->News_category)->text();
                //echo($scraped_category. '<br>');
            if($instance->compare_category($scraped_category,$Category) ){ 
                $innerData['category'] =$scraped_category;
                $innerData['title']    = $title;
                $innerData['text']     = $paragraphs;
                $image=$crawler->filter($urls->get($index)->News_image);
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
                $innerData['image']     =  $urls->get($index)->News_url . $imageUrl;
                }
                 //$instance->translateDate()
                $innerData['date']    = $crawler->filter($urls->get($index)->News_date)->text();
                $data[$urls->get($index)->News_name][]=$innerData;
            }
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
    sleep(3);
} 
$promise = $pool->promise();
// Force the pool of requests to complete.
$promise->wait();
        },
    'rejected' => function (Exception $reason,$index2){
                dd($reason);
        },
        ]);
    foreach ($pool as $index => $response) {
            sleep(2);
    }
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

public static function guessScrapingElements($siteUrl,$keyword){
    
    $searchUrl= 'https://www.google.com/search?q=' . urlencode($keyword) . ' site:'. urlencode($siteUrl)
    . '&tbs=0';
    //dd($searchUrl);
    $client = new Client( [
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0',
            'Accept' => 'text/html',
            'Referer' => 'http://www.est-umi.ac.ma/'
        ],
        'verify' => base_path('public/cacert.pem')
    ]); 
    $response = $client->get($searchUrl);
    $crawler = new Crawler($response->getBody()->getContents());
    $result=[];
    $crawler->filter('.yuRUbf > a')->each(function ($node,$key)use(&$client,&$result){
       $testArticleUrl=$node->attr('href');
       $testArticleTitle=$node->filter('h3 > span')->text();
       //$result['url']=$testArticleUrl;
       $response = $client->get($testArticleUrl,[
        'on_stats' => function (TransferStats $stats) use (&$url) {
            $url = $stats->getEffectiveUri();
        }]);
        $result['url']=$url;
       $crawler = new Crawler($response->getBody()->getContents());
       $matchingElements = $crawler->filterXPath("//body//article[contains(.,'$testArticleTitle')]");
       //dd($matchingElements);
        $matchingElements->each(function (Crawler $element) use (&$result) {
           $content=$element->filter(("[class*='content'] > p,[id*='content'] > p "));
           $paragraphs='';
            for ($i = 0; $i < count($content);$i++){
                $paragraphs.= $content->eq($i)->text() ." \n"; 
           }
           $result['text']=$paragraphs;
           $result['date']=$element->filter("[class*='date'],[id*='date']")->text();
           $result['title']=$element->filter("[class*='title'],[id*='title']")->text();
          /*  if($element->filter("[class*='image'],[id*='image'],[class*='img'],[id*='img']")->count() > 1){
            dd('1 '.$element->filter("img")->eq(0)->attr('src'));
            $result['image'] = $element->filter("[class*='image'],[id*='image'],[class*='img'],[id*='img']")->first()->attr('src');
            }else{
            dd('2 '.$element->filter("img")->attr('src'));
            $result['image']=$element->filter("[class*='image'],[id*='image'],[class*='img'],[id*='img']")->attr('src');
            }   */
       }); 
       $allAttributesNotEmptyOrNull = collect($result)->every(function ($attribute) {
        return !empty($attribute) || $attribute === null;
        });
        if ($allAttributesNotEmptyOrNull) {
            return false;
        } 
    });

    $result['category']='';
    $result['image']='';
return $result;
}

}

