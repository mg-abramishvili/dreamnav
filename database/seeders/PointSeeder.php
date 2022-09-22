<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PointSeeder extends Seeder
{
    public function run()
    {
        DB::table('points')->insert([
            'id' => 1,
            'scheme_id' => 1,
            'name' => 'Главная сцена',
            'object' => '["528 641","529 642","547 660","580 626","561 607"]',
            'created_at' => '2022-09-10 07:00:00',
            'updated_at' => '2022-09-10 07:00:00'
        ]);
    }
}