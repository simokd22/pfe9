<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $title;
    protected $content;
    protected $image;
    protected $date;
    protected $category ;

    public function __construct($title, $content, $image, $date,$category)
    {
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->date = $date;
        $this->category=$category;
    }
}