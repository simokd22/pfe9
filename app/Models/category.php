<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
    'category_name',
    'synonyms_categories',
    'id_langue',
    ];
    protected $casts = ['synonyms_categories' => 'array']; 
}
