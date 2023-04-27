<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Newspaper extends Model
{
    use HasFactory;
    protected $pages;
    protected $articles=[];

    public function __construct($pages)
    {
        $this->pages = $pages;

    }
}