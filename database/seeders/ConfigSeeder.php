<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        DB::table('configs')->insert([
            'id' => 1,
            'theme' => 'pesok',
            'orientation' => 'vertical',
            'activated' => 'n',
            'title' => 'Парк Песчанка',
            'logo' => '/img/pesok/logo.png',
        ]);
    }
}