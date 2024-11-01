<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'     =>'product1',
            'description'    =>'description1',
            'price'  => 800,
            'available'=>1,
            'image'  =>'upload\product\1729715713.jpg',
            'user_id' =>1,
        ]);
        Product::create([
            'name'     =>'product2',
            'description'    =>'description2',
            'price'  => 400,
            'available'=>1,
            'image'  =>'upload\product\1729716807.png',
            'user_id' =>1,
        ]);
        Product::create([
            'name'     =>'product3',
            'description'    =>'description3',
            'price'  => 3300,
            'available'=>1,
            'image'  =>'upload\product\1729716807.png',
            'user_id' =>1,
        ]);
    }
}
