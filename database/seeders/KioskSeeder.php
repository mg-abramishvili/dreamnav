<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KioskSeeder extends Seeder
{
    public function run()
    {
        DB::table('kiosks')->insert([
            'id' => 1,
            'scheme_id' => 1,
            'name' => 'К1',
            'x' => 188,
            'y' => 650,
        ]);
    }
}