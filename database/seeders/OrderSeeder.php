<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'user_id'     =>'3',
            'product_id'     =>'1',
            'state'    =>'Pending',
        ]);
        Order::create([
            'user_id'     =>'3',
            'product_id'     =>'2',
            'state'    =>'Shipped',
        ]);
        Order::create([
            'user_id'     =>'3',
            'product_id'     =>'3',
            'state'    =>'Delivered',
        ]);
    }
}
