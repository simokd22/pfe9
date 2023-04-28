<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Newspaper extends Model
{
    private $pages;
    private $articles;

    public function __construct()
    {
        $this->articles = [];
    } 
}