<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RouteSeeder extends Seeder
{
    public function run()
    {
        DB::table('routes')->insert([
            'id' => 1,
            'kiosk_id' => 1,
            'point_id' => 1,
            'scheme1_id' => 1,
            'scheme2_id' => null,
            'route_code_floor1' => '[{"x":194,"y":661},{"x":197,"y":657},{"x":211,"y":592},{"x":219,"y":578},{"x":237,"y":564},{"x":269,"y":543},{"x":295,"y":536},{"x":319,"y":538},{"x":354,"y":552},{"x":434,"y":594},{"x":548,"y":626}]',
            'route_code_floor2' => null,
            'floor1_text_begin' => null,
            'floor1_text_end' => null,
            'floor2_text_begin' => null,
            'floor2_text_end' => null,
            'created_at' => '2022-09-10 07:00:00',
            'updated_at' => '2022-09-10 07:00:00'
        ]);
    }
}