<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            'id' => 1,
            'name' => 'Информация для посетителей',
            'parent_id' => null,
            'language_id' => 1,
            'order' => 3,
            'created_at' => '2022-09-10 07:00:00',
            'updated_at' => '2022-09-10 07:00:00'
        ]);
    }
}