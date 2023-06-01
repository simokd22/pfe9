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


/* public function translateDate($input,$format='') {
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
} */

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
/* if(!empty($date_start) && !empty($date_end)){
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
} */
if(!empty($date_start) && !empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=' .$key_word  . ' site:'. urlencode($urls->News_url)
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));
}
else if(empty($date_start) && !empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=' .$key_word  . ' site:'. urlencode($urls->News_url)
       . '&tbs=cdr%3A1%2Ccd_min%3A'. '%2Ccd_max%3A' . urlencode(Carbon::create($date_end)->format('m/d/Y'));
}
else if(!empty($date_start) && empty($date_end)){
    $searchUrl= 'https://www.google.com/search?q=' .$key_word  . ' site:'. urlencode($urls->News_url)
       . '&tbs=cdr%3A1%2Ccd_min%3A' . urlencode(Carbon::create($date_start)->format('m/d/Y'))
       . '%2Ccd_max%3A';
}
else{
    $searchUrl= 'https://www.google.com/search?q=' .$key_word  . ' site:'. urlencode($urls->News_url)
    . '&tbs=0';
}
        return $searchUrl;
}
public static function handle(String $key_word,$date_start='',$date_end='',$sites,$Category=''){
    $instance=new self;
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
if(isset($searchResults[$index])){
$pool = new Pool($client, $request($searchResults[$index]), [
    'concurrency' => 20,
    'fulfilled' => function (Response $response,$index3) use ($index,$urls, $Category,$key_word) {
        global $data;
        $instance=new self;
        
        $crawler = new Crawler($response->getBody()->getContents());
        try{
            $content = $crawler->filter($urls->get($index)->News_content);
            $paragraphs='';
            for ($i = 0; $i < count($content);$i++){
            $paragraphs.= $content->eq($i)->text() ." \n";
            }
        }catch(Exception $e){
            $paragraphs='';
        }
        try{
            $title=$crawler->filter($urls->get($index)->News_title)->text();
        }catch(Exception $e){
            $title='';
        }
        
        try{
            $scraped_category=$crawler->filter($urls->get($index)->News_category)->text();
        }catch(Exception $e){
            $scraped_category='';
        }
        
        //if(str_contains($title,$key_word) || str_contains($paragraphs,$key_word)){}
            
                //echo($scraped_category. '<br>');
            if($instance->compare_category($scraped_category,$Category) && $title!='' && $paragraphs!='' ){ 
                try{
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
                }catch(Exception $e){
                    $innerData['image']='';
                }
                try{$innerData['date']    = $crawler->filter($urls->get($index)->News_date)->text();
                }catch(Exception $e){
                    $innerData['date']    = '';
                }
                $innerData['category'] =$scraped_category;
                $innerData['title']    = $title;
                $innerData['text']     = $paragraphs;
                $data[$urls->get($index)->News_name][]=$innerData;
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
}
        },
    'rejected' => function (Exception $reason,$index2){
                //dd($reason);
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
foreach($data as $innerdata){
if(count($innerdata)>1){
    return $data;
}
}
$data=[];
//usort($data, function ($a, $b) {return strtotime($b['date']) - strtotime($a['date']);});
return $data;
        //
        //return view('test',[
        //    'data'=>$data
        //]);
//dd();



}

public static function guessScrapingElements($siteUrl,$keyword,$title='',$date='',$content='',$image='',$cat=''){
    
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
    $crawler->filter('.yuRUbf > a')->each(function ($node,$key)use(&$client,&$result,$title,$date,$content,$image,$cat,$siteUrl){
       $testArticleUrl=$node->attr('href');
       //$testArticleTitle=$node->filter('h3 > span,h3')->text();
       //$result['url']=$testArticleUrl;
       $response = $client->get($testArticleUrl);
       //dd($content);
       $crawler = new Crawler($response->getBody()->getContents());
       try{
       $content = $crawler->filter($content);
       $paragraphs='';
       for ($i = 0; $i < count($content);$i++){
       $paragraphs.= $content->eq($i)->text() ." \n";
       }
        }catch(Exception $e){
            $paragraphs='';
       }
try{
       $title=$crawler->filter($title)->text();
    }catch(Exception $e){
        $title='';
       }
       try{
           $scraped_category=$crawler->filter($cat)->first()->text();
        }catch(Exception $e){
            $scraped_category="";
        }   
               //echo($scraped_category. '<br>');
               $innerData['category'] =$scraped_category;
               $innerData['title']    = $title;
               $innerData['text']     = $paragraphs;
               
               //dd($image->attr('src'));
               try{
                $image=$crawler->filter($image);
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
               $innerData['image']     =  $siteUrl . $imageUrl;
               }
            }catch(Exception $e){
                $innerData['image']='';
               }
                //$instance->translateDate()
                try{
               $innerData['date']    = $crawler->filter($date)->text();
            }catch(Exception $e){
                $innerData['date']="";
            }
               $result[]=$innerData;
            
/*        $matchingElements = $crawler->filterXPath("//body//article[contains(.,'$testArticleTitle')]");
          try{
                $matchingElements = $crawler->filter("body article:contains('$testArticleTitle'), body [class*='article']:contains('$testArticleTitle'), body [id*='article']:contains('$testArticleTitle')");
            }catch(Exception $e){
                $matchingElements = $crawler->filterXPath("//body//article[contains(.,'$testArticleTitle')]");
            }
       //dd($matchingElements);
        $matchingElements->each(function (Crawler $element) use (&$result) {
           try{
            $result['date']=$element->filter("[class*='date'],[id*='date']")->text();
            $result['dateClass']=$element->filter("[class*='date'],[id*='date']")->attr('class');
           }catch(Exception $e){
            $result['date']='';
           }
           try{
            $result['title']=$element->filter("[class*='title'],[id*='title']")->text();
            $result['titleClass']=$element->filter("[class*='title'],[id*='title']")->attr('class');
           }catch(Exception $e){
            $result['title']='';
           }
           try{
            $content=$element->filter(("[class*='content'] > p,[id*='content'] > p "));
           $paragraphs='';
            for ($i = 0; $i < count($content);$i++){
                $paragraphs.= $content->eq($i)->text() ." \n"; 
           }
           $result['text']=$paragraphs;
           $result['contentClass']=$element->filter("[class*='content'],[id*='content']")->attr('class');
           }catch(Exception $e){
            $result['text']='';
           }
           
           
           
           
           

           try{
            if($element->filter("img,[class*='image'],[id*='image'],[class*='img'],[id*='img'] ")->count() > 1){
             
            //$result['image'] = $element->filter("[class*='image'],[id*='image'],[class*='img'],[id*='img']")->first()->attr('src');
            $result['imageClass']=$element->filter("img")->first()->attr('class');
            $result['image']=$element->filter("img")->first()->attr('src');
            }else{
           
            //$result['image']=$element->filter("[class*='image'],[id*='image'],[class*='img'],[id*='img']")->attr('src');
            $result['imageClass']=$element->filter("img")->attr('class');
            $result['image']=$element->filter("img")->first()->attr('src');
            }
        } catch(Exception $e){
            $result['image']='';
        }
       }); 
       $allAttributesNotEmptyOrNull = collect($result)->every(function ($attribute) {
        return !empty($attribute) || $attribute === null;
        });
        if ($allAttributesNotEmptyOrNull) {
            return false;
        } */
    });

    //$result['category']='';
    dd($result);
    
return $result;
}

}

