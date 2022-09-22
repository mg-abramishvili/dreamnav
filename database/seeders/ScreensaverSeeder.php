<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ScreensaverSeeder extends Seeder
{
    public function run()
    {
        DB::table('screensavers')->insert([
            [
                'id' => 1,
                'page_id' => null,
                'point_id' => null,
                'event_id' => null,
                'name' => 'Заставка 1 - Фото',
                'type' => 'image',
                'content' => '/img/pesok/screensaver1.jpg',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 2,
                'page_id' => null,
                'point_id' => null,
                'event_id' => null,
                'name' => 'Заставка 2 - Видео с коптера',
                'type' => 'video',
                'content' => '/img/pesok/screensaver2.mp4',
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
        ]);
    }
}