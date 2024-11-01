<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name'=>'cat1',
        ]);
        Category::create([
            'name'=>'cat2',
        ]);
        Category::create([
            'name'=>'cat3',
        ]);
        Category::create([
            'name'=>'cat4',
        ]);
        Category::create([
            'name'=>'cat5',
        ]);
    }
}
