<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    public function run()
    {
        DB::table('banners')->insert([
            'id' => 1,
            'page_id' => null,
            'point_id' => null,
            'event_id' => null,
            'name' => 'Баннер №1',
            'type' => 'image',
            'content' => '/img/pesok/banner1.jpg',
            'created_at' => '2022-09-10 07:00:00',
            'updated_at' => '2022-09-10 07:00:00'
        ]);
    }
}