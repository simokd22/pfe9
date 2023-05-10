<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $title;
    public $content;
    public $image;
    public $date;
    public $category ;

    public function __construct($title, $content, $image, $date,$category)
    {
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->date = $date;
        $this->category=$category;
    }
   
}