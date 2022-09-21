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
            [
                'id' => 1,
                'name' => 'О парке',
                'parent_id' => null,
                'language_id' => 1,
                'icon_id' => 1,
                'order' => 1,
                'is_folder' => false,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 2,
                'name' => 'Афиша',
                'parent_id' => null,
                'language_id' => 1,
                'icon_id' => 2,
                'order' => 2,
                'is_folder' => false,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 3,
                'name' => 'Информация',
                'parent_id' => null,
                'language_id' => 1,
                'icon_id' => 3,
                'order' => 3,
                'is_folder' => false,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 4,
                'name' => 'Схема парка',
                'parent_id' => null,
                'language_id' => 1,
                'icon_id' => 4,
                'order' => 4,
                'is_folder' => false,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 5,
                'name' => 'Фотогалерея',
                'parent_id' => null,
                'language_id' => 1,
                'icon_id' => 5,
                'order' => 5,
                'is_folder' => true,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 6,
                'name' => 'Контакты',
                'parent_id' => null,
                'language_id' => 1,
                'icon_id' => 6,
                'order' => 6,
                'is_folder' => false,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 7,
                'name' => 'Фотогалерея 1',
                'parent_id' => 5,
                'language_id' => 1,
                'icon_id' => 1,
                'order' => 1,
                'is_folder' => false,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
        ]);
    }
}