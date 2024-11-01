<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     =>'Super Admin',
            'email'    =>'superAdmin@gmail.com',
            'isAdmin'  =>1,
            'isSuperAdmin'=>1,
            'isBlock'  =>0,
            'password' =>Hash::make('admin12345'),
        ]);
        User::create([
            'name'     =>'Zeina Aziz',
            'email'    =>'zeinaaziz@gmail.com',
            'isAdmin'  =>0,
            'isSuperAdmin'=>0,
            'isBlock'  =>0,
            'password' =>Hash::make('zeina12345'),
        ]);
        User::create([
            'name'     =>'Dina Aziz',
            'email'    =>'dinaziz@gmail.com',
            'isAdmin'  =>0,
            'isSuperAdmin'=>0,
            'isBlock'  =>0,
            'password' =>Hash::make('dina12345'),
        ]);
    }
}
