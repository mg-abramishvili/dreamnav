<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ConfigSeeder::class,
            PageSeeder::class,
            BlockSeeder::class,
            BannerSeeder::class,
            EventSeeder::class,
            ScreensaverSeeder::class,
            IconSeeder::class,
            SchemeSeeder::class,
            KioskSeeder::class,
            PointSeeder::class,
            RouteSeeder::class,
        ]);
    }
}