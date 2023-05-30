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
        Newsinfo::create([

            'News_name'=>'alyaoum24',
            'News_url'=>"https://alyaoum24.com/",
            'News_category'=>'.breadcrumb >  li:last-child',
            'News_image'=>'.wp-post-image',
            'News_title'=>'.infoSingle > h1',
            'News_content'=>'.post_content > p',
            'News_date'=>'.timePost',
            'News_type'=>'journal',
            'id_langue'=>1,
          ]);
       Newsinfo::create([

            'News_name'=>'assahraa',
            'News_url'=>"https://assahraa.ma/",
            'News_category'=>'.main-title',
            'News_image'=>'.img-thumbnail',
            'News_title'=>'.sec-info > h1',
            'News_content'=>'.article > p',
            'News_date'=>'.time',
            'News_type'=>'magazine',
            'id_langue'=>1,
          ]);
        Newsinfo::create([

            'News_name'=>'almassaa',
            'News_url'=>"https://almassaa.com/",
            'News_category'=>'.menu > .current-post-ancestor',
            'News_image'=>'.single-featured-image > img',
            'News_title'=>'.post-title',
            'News_content'=>'.entry-content >  p',
            'News_date'=>'.date ',
            'News_type'=>'magazine',
            'id_langue'=>1,
          ]);
         Newsinfo::create([

            'News_name'=>'hibapress',
            'News_category'=>'.menu > .current-post-ancestor',
            'News_url'=>"https://ar.hibapress.com/",
            'News_image'=>'.featured-area-inner  img',
            'News_title'=>'.post-title',
            'News_content'=>'.entry-content > p',
            'News_date'=>' .date',
            'News_type'=>'journal',
            'id_langue'=>1,
          ]);
       Newsinfo::create([

            'News_name'=>'goud',
            'News_url'=>"https://www.goud.ma/",
            'News_category'=>'.cat-link',
            'News_image'=>'.content > img',
            'News_title'=>'.col-md-12 > h1',
            'News_content'=>'.content > p',
            'News_date'=>' .date',
            'News_type'=>'magazine',
            'id_langue'=>1,
         ]);
         Newsinfo::create([

            'News_name'=>'al3omk',
            'News_url'=>"https://al3omk.com/",
            'News_category'=>'.post-cat > a',
            'News_image'=>'.post-image > img',
            'News_title'=>'.post-title',
            'News_content'=>'.post-body > p',
            'News_date'=>'.post-date',
            'News_type'=>'journal',
            'id_langue'=>1,
          ]);
       Newsinfo::create([

            'News_name'=>'alakhbar',
            'News_url'=>"https://www.alakhbar.press.ma/",
            'News_category'=>'.post-cat-wrap > a:last-child',
            'News_image'=>'.featured-area-inner  img',
            'News_title'=>'.post-title',
            'News_content'=>'.entry-content > p',
            'News_date'=>' .post-meta > .date',
            'News_type'=>'magazine',
            'id_langue'=>1,
          ]);
      Newsinfo::create([

            'News_name'=>'tanja24',
            'News_url'=>"https://tanja24.com/",
            'News_category'=>'.current-post-parent > a',
            'News_image'=>'.post-thumbnail > img',
            'News_title'=>'.single-post-title',
            'News_content'=>'.entry-content > p',
            'News_date'=>'.post-published > b',
            'News_type'=>'journal',
            'id_langue'=>1,
          ]);
       Newsinfo::create([

            'News_name'=>'barlamane',
            'News_url'=>"https://www.barlamane.com/",
            'News_category'=>'.current-post-parent:not(.menu-item-has-children) > a',
            'News_image'=>'div.thumb > img',
            'News_title'=>'.post-content > .title',
            'News_content'=>'.content > p',
            'News_date'=>'.date',
            'News_type'=>'journal',
            'id_langue'=>1,
          ]);

        Newsinfo::create([


            'News_name'=>'hespress',
            'News_url'=>"https://www.hespress.com/",
            'News_category'=>'.breadcrumb > li:last-child',
            'News_image'=>'.ratio-medium > img',
            'News_title'=>'.post-title',
            'News_content'=>'.article-content > p',
            'News_date'=>'.date-post',
            'News_type'=>'journal',
            'id_langue'=>1,
          ]);


      Newsinfo::create([

        'News_name'=>'hespress',
        'News_url'=>"https://fr.hespress.com/",
        'News_category'=>'.breadcrumb > li:last-child',
        'News_image'=>'.img-fluid',
        'News_title'=>'.post-title',
        'News_content'=>'.article-content > p',
        'News_date'=>'.date-post',
        'News_type'=>'journal',
        'id_langue'=>2,
      ]);
      Newsinfo::create([
      'News_name'=>'al3omk',
      'News_url'=>"https://fr.al3omk.com/",
      'News_category'=>'.current-post-parent',
      'News_image'=>'.lg-big-image > img',
      'News_title'=>'.title-single',
      'News_content'=>'.post_content > p',
      'News_date'=>'.timePost',
      'News_type'=>'journal',
      'id_langue'=>2,
    ]);
    Newsinfo::create([

        'News_name'=>'hibapress',
        'News_category'=>'.current-post-parent ',
        'News_url'=>"https://fr.hibapress.com/",
        'News_image'=>'.wp-post-image',
        'News_title'=>'.post-title',
        'News_content'=>'.entry-content > p',
        'News_date'=>' .date',
        'News_type'=>'journal',
        'id_langue'=>2,
      ]);
      Newsinfo::create([

        'News_name'=>'alyaoum24',
        'News_url'=>"https://fr.alyaoum24.com/",
        'News_category'=>'.current-post-parent > a',
        'News_image'=>'.imagePostArchive > a > img',
        'News_title'=>'.infoSingle > h1',
        'News_content'=>'.post_content > p',
        'News_date'=>'.timePost',
        'News_type'=>'magazine',
        'id_langue'=>2,
      ]);
       Newsinfo::create([

        'News_name'=>'barlamane',
        'News_url'=>"https://www.barlamane.com/fr/",
        'News_category'=>'.breadcrumbs > a:last-child',
        'News_image'=>'.wp-post-image',
        'News_title'=>'.entry-header > .entry-title',
        'News_content'=>'.entry-content > p',
        'News_date'=>'.entry-date',
        'News_type'=>'magazine',
        'id_langue'=>2,
      ]);
    }
}
