<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsinfo extends Model
{
    use HasFactory;
    protected $fillable = [
    'News_name',
    'News_url',
    'News_category',
    'id_langue',
    ];
}
