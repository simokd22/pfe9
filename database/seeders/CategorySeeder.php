<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name'=>'رياضة',
            'synonyms_categories'=>json_encode(['رياضة','الرياضة','سبور','الرياضي']),
            'id_langue'=>1,
            ]);
        Category::create([
            'category_name'=>'سياسة',
            'synonyms_categories'=>json_encode(['سياسة','سياسية','وطنية']),
            'id_langue'=>1,
            ]);
        Category::create([
            'category_name'=>'مجتمع',
            'synonyms_categories'=>json_encode(['مجتمع',]),
            'id_langue'=>1,
            ]);
        Category::create([
            'category_name'=>'اقتصاد',
            'synonyms_categories'=>json_encode(['اقتصاد','إقتصاد','مال وأعمال']),
            'id_langue'=>1,
            ]);

        Category::create([
            'category_name'=>'sport',
            'synonyms_categories'=>json_encode(['sport','sports','sport express',]),
            'id_langue'=>2,
            ]);
        Category::create([
            'category_name'=>'politique',
            'synonyms_categories'=>json_encode(['politique',]),
            'id_langue'=>2,
            ]);
        Category::create([
            'category_name'=>'societe',
            'synonyms_categories'=>json_encode(['société','national']),
            'id_langue'=>2,
            ]);
        Category::create([
            'category_name'=>'economie',
            'synonyms_categories'=>json_encode(['economie','économie',]),
            'id_langue'=>2,
            ]);
    }
}
