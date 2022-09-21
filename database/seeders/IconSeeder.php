<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IconSeeder extends Seeder
{
    public function run()
    {
        DB::table('icons')->insert([
            [
                'id' => 1,
                'image' => '/img/pesok/menu1.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 2,
                'image' => '/img/pesok/menu2.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 3,
                'image' => '/img/pesok/menu3.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 4,
                'image' => '/img/pesok/menu4.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 5,
                'image' => '/img/pesok/menu5.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 6,
                'image' => '/img/pesok/menu6.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
        ]);
    }
}