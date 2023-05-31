<?php

namespace Database\Seeders;

use App\Models\Newsinfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      /* magazines arabe */ 
      Newsinfo::create([
        'News_name'=>'alayam',
        'News_url'=>"https://www.alayam.com/",
        'News_category'=>'.breadcrumb > li:nth-child(2)',
        'News_image'=>'.lg-article-media > img',
        'News_title'=>'.article-title > h1',
        'News_content'=>'.HwkLR div',
        'News_date'=>'.datetimefull12',
        'id_langue'=>1,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'zahratalkhaleej',
        'News_url'=>"https://www.zahratalkhaleej.ae/",
        'News_category'=>'.article-video .hastag',
        'News_image'=>'.article-video >.container .article-slider img',
        'News_title'=>'.article-video >.container  h1',
        'News_content'=>'.article-right .article-content  > p',
        'News_date'=>'.article-right  .date',
        'id_langue'=>1,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'zamane',
        'News_url'=>"https://ar.zamane.ma/",
        'News_category'=>'.jeg_meta_category  a:last-child',
        'News_image'=>'.jeg_inner_content .thumbnail-container > img',
        'News_title'=>'.entry-header > h1',
        'News_content'=>'.entry-content  > .content-inner  .x_x_Arab',
        'News_date'=>'.jeg_meta_container .jeg_meta_date > a',
        'id_langue'=>1,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'babmagazine',
        'News_url'=>"http://ar.babmagazine.ma/",
        'News_category'=>'nav.breadcrumb > ol >li:nth-child(2)',
        'News_image'=>'.caption-img  > img',
        'News_title'=>'.field--name-title ',
        'News_content'=>'.node__content >.field--name-body  > p',
        'News_date'=>'.blablabla',
        'id_langue'=>1,
        'type'=>'magazine'
      ]);
      /* Newsinfo::create([
        'News_name'=>'',
        'News_url'=>"",
        'News_category'=>'',
        'News_image'=>'',
        'News_title'=>'',
        'News_content'=>'',
        'News_date'=>'',
        'id_langue'=>1,
        'type'=>'magazine'
      ]); */

      /* journaux arabe */ 
        Newsinfo::create([
            'News_name'=>'alyaoum24',
            'News_url'=>"https://alyaoum24.com/",
            'News_category'=>'.breadcrumb >  li:last-child',
            'News_image'=>'.wp-post-image',
            'News_title'=>'.infoSingle > h1',
            'News_content'=>'.post_content > p',
            'News_date'=>'.timePost',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
       Newsinfo::create([
            
            'News_name'=>'assahraa',
            'News_url'=>"https://assahraa.ma/",
            'News_category'=>'.main-title',
            'News_image'=>'.img-thumbnail',
            'News_title'=>'.sec-info > h1',
            'News_content'=>'.article > p',
            'News_date'=>'.time',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
        Newsinfo::create([
            
            'News_name'=>'almassaa',
            'News_url'=>"https://almassaa.com/",
            'News_category'=>'.menu > .current-post-ancestor',
            'News_image'=>'.single-featured-image > img',
            'News_title'=>'.post-title',
            'News_content'=>'.entry-content >  p',
            'News_date'=>'.date ',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
         Newsinfo::create([
            
            'News_name'=>'hibapress',
            'News_category'=>'.menu > .current-post-ancestor',
            'News_url'=>"https://ar.hibapress.com/",
            'News_image'=>'.featured-area-inner  img',
            'News_title'=>'.post-title',
            'News_content'=>'.entry-content > p',
            'News_date'=>' .date',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
       Newsinfo::create([
            
            'News_name'=>'goud',
            'News_url'=>"https://www.goud.ma/",
            'News_category'=>'.cat-link',
            'News_image'=>'.content > img',
            'News_title'=>'.col-md-12 > h1',
            'News_content'=>'.content > p',
            'News_date'=>' .date',
            'id_langue'=>1,
            'type'=>'journal'
         ]);
         Newsinfo::create([
            
            'News_name'=>'al3omk',
            'News_url'=>"https://al3omk.com/",
            'News_category'=>'.post-cat > a',
            'News_image'=>'.post-image > img',
            'News_title'=>'.post-title',
            'News_content'=>'.post-body > p',
            'News_date'=>'.post-date',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
       Newsinfo::create([
            
            'News_name'=>'alakhbar',
            'News_url'=>"https://www.alakhbar.press.ma/",
            'News_category'=>'.post-cat-wrap > a:last-child',
            'News_image'=>'.featured-area-inner  img',
            'News_title'=>'.post-title',
            'News_content'=>'.entry-content > p',
            'News_date'=>' .post-meta > .date',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
      Newsinfo::create([
            
            'News_name'=>'tanja24',
            'News_url'=>"https://tanja24.com/",
            'News_category'=>'.current-post-parent > a',
            'News_image'=>'.post-thumbnail > img',
            'News_title'=>'.single-post-title',
            'News_content'=>'.entry-content > p',
            'News_date'=>'.post-published > b',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
       Newsinfo::create([
            
            'News_name'=>'barlamane',
            'News_url'=>"https://www.barlamane.com/",
            'News_category'=>'.current-post-parent:not(.menu-item-has-children) > a',
            'News_image'=>'div.thumb > img',
            'News_title'=>'.post-content > .title',
            'News_content'=>'.content > p',
            'News_date'=>'.date',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
    
        Newsinfo::create([
            'News_name'=>'hespress',
            'News_url'=>"https://www.hespress.com/",
            'News_category'=>'.breadcrumb > li:last-child',
            'News_image'=>'.ratio-medium > img',
            'News_title'=>'.post-title',
            'News_content'=>'.article-content > p',
            'News_date'=>'.date-post',
            'id_langue'=>1,
            'type'=>'journal'
          ]);

          Newsinfo::create([
            'News_name'=>'almountakhab',
            'News_url'=>"https://www.almountakhab.com/",
            'News_category'=>'.main-ul .sub-menu > li:last-child',
            'News_image'=>'.main_figure > img',
            'News_title'=>'.article-page .column-d > h1',
            'News_content'=>'.article-body > p',
            'News_date'=>'.article-page .time',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
          Newsinfo::create([
            'News_name'=>'mapexpress',
            'News_url'=>"http://www.mapexpress.ma/ar/",
            'News_category'=>'.current-actualite-parent ',
            'News_image'=>'.single_act img',
            'News_title'=>'.single_act > h1',
            'News_content'=>'.single_act > p',
            'News_date'=>'.single_act > .a-post',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
          Newsinfo::create([
            'News_name'=>'annahar',
            'News_url'=>"https://annahar-press.com/",
            'News_category'=>'.jeg_meta_category  a:last-child',
            'News_image'=>'.jeg_inner_content .thumbnail-container > img',
            'News_title'=>'.entry-header > h1',
            'News_content'=>'.entry-content  > .content-inner  > p',
            'News_date'=>'.jeg_meta_container .jeg_meta_date > a',
            'id_langue'=>1,
            'type'=>'journal'
          ]);
          Newsinfo::create([
            'News_name'=>'ahdath',
            'News_url'=>"https://www.ahdath.info/",
            'News_category'=>'.morearticles-breadcrumb-a > h1',
            'News_image'=>'.ahdath-article-details  .layout-ratio > img',
            'News_title'=>'.title-article',
            'News_content'=>'.article-content  > .article-desc > p',
            'News_date'=>'.publishing-date',
            'id_langue'=>1,
            'type'=>'journal'
          ]);


 /* magazines francais */ 
      Newsinfo::create([
        'News_name'=>'telquel',
        'News_url'=>"https://telquel.ma/",
        'News_category'=>'.current-post-ancestor  > a',
        'News_image'=>'.single-cover > .article-image > img',
        'News_title'=>'.single-header .article-heading',
        'News_content'=>'.single-content > .col-large > p',
        'News_date'=>'.single-header .article-publish',
        'id_langue'=>2,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'lobservateur' ,
        'News_url'=>'https://lobservateur.info/' ,
        'News_category'=>'.mobileView >h2' ,
        'News_image'=>'.article-single-image img' ,
        'News_title'=>'.title-article' ,
        'News_content'=>'.article-desc > p' ,
        'News_date'=>'.publishing-date' ,
        'id_langue'=>2,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'lavieeco' ,
        'News_url'=>'https://www.lavieeco.com/' ,
        'News_category'=>'h3.mvp-post-cat' ,
        'News_image'=>'.mvp-post-feat-img-wide2 > img' ,
        'News_title'=>'.mvp-post-title' ,
        'News_content'=>'.mvp-post-soc-in  p' ,
        'News_date'=>'.mvp-post-date > time' ,
        'id_langue'=>2,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'maroc-hebdo' ,
        'News_url'=>'https://www.maroc-hebdo.press.ma/' ,
        'News_category'=>'.rt-cat-primary' ,
        'News_image'=>'.post-body  img' ,
        'News_title'=>'.post-header > h2' ,
        'News_content'=>'.post-body >  p' ,
        'News_date'=>'.post-meta > ul >li:nth-child(2) >span' ,
        'id_langue'=>2,
        'type'=>'magazine'
      ]);
      Newsinfo::create([
        'News_name'=>'challenge',
        'News_url'=>"https://www.challenge.ma/",
        'News_category'=>'.vw-category-link',
        'News_image'=>'.attachment-vw_two_third_thumbnail_no_crop',
        'News_title'=>'.entry-title',
        'News_content'=>'.vw-post-content p',
        'News_date'=>'.vw-post-date > time',
        'id_langue'=>2,
        'type'=>'magazine'
      ]);
       /* journaux francais */   
    
      Newsinfo::create([
        'News_name'=>'hespress',
        'News_url'=>"https://fr.hespress.com/",
        'News_category'=>'.breadcrumb > li:last-child',
        'News_image'=>'.img-fluid',
        'News_title'=>'.post-title',
        'News_content'=>'.article-content > p',
        'News_date'=>'.date-post',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
      'News_name'=>'al3omk',
      'News_url'=>"https://fr.al3omk.com/",
      'News_category'=>'.current-post-parent',
      'News_image'=>'.lg-big-image > img',
      'News_title'=>'.title-single',
      'News_content'=>'.post_content > p',
      'News_date'=>'.timePost',
      'id_langue'=>2,
      'type'=>'journal'
    ]);
    Newsinfo::create([
        
        'News_name'=>'hibapress',
        'News_category'=>'.current-post-parent ',
        'News_url'=>"https://fr.hibapress.com/",
        'News_image'=>'.wp-post-image',
        'News_title'=>'.post-title',
        'News_content'=>'.entry-content > p',
        'News_date'=>' .date',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
        
        'News_name'=>'alyaoum24',
        'News_url'=>"https://fr.alyaoum24.com/",
        'News_category'=>'.current-post-parent > a',
        'News_image'=>'.imagePostArchive > a > img',
        'News_title'=>'.infoSingle > h1',
        'News_content'=>'.post_content > p',
        'News_date'=>'.timePost',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
       Newsinfo::create([
      
        'News_name'=>'barlamane',
        'News_url'=>"https://www.barlamane.com/fr/",
        'News_category'=>'.breadcrumbs > a:last-child',
        'News_image'=>'.wp-post-image',
        'News_title'=>'.entry-header > .entry-title',
        'News_content'=>'.entry-content > p',
        'News_date'=>'.entry-date',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
        'News_name'=>'leconomiste',
        'News_url'=>"https://www.leconomiste.com/",
        'News_category'=>'',
        'News_image'=>'.legende-in-article img',
        'News_title'=>'#content_leconomiste > h1',
        'News_content'=>'.field-item p',
        'News_date'=>'',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
        'News_name'=>'mapexpress',
        'News_url'=>"https://www.mapexpress.ma",
        'News_category'=>'.current-actualite-parent ',
        'News_image'=>'.single_act img',
        'News_title'=>'.single_act > h1',
        'News_content'=>'.single_act > p',
        'News_date'=>'.single_act > .a-post',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
        'News_name'=>'albayane',
        'News_url'=>"https://albayane.press.ma/",
        'News_category'=>'#primary  .post-categories> li',
        'News_image'=>'#primary   img',
        'News_title'=>'#primary .entry-title',
        'News_content'=>'#primary  .entry-content >p',
        'News_date'=>'#primary   .entry-meta',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
        'News_name'=>'lematin',
        'News_url'=>"https://lematin.ma/",
        'News_category'=>'.title-section',
        'News_image'=>'.detail-article img',
        'News_title'=>'.detail-article #title',
        'News_content'=>'.detail-article .card-body >p',
        'News_date'=>'.detail-article time',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
      Newsinfo::create([
        'News_name'=>'lecanardlibere',
        'News_url'=>"https://www.lecanardlibere.com/",
        'News_category'=>'.div-block-161 >  .category-link ',
        'News_image'=>'.div-block-163',
        'News_title'=>'.titre-post-h3 ',
        'News_content'=>'.rich-text-block  > p',
        'News_date'=>'.div-block-162 > .date',
        'id_langue'=>2,
        'type'=>'journal'
      ]);
    }
}
