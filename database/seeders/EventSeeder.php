<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            'id' => 1,
            'name' => 'Клоуны могут всё',
            'date' => '2022-08-05',
            'time' => '15:00',
            'image' => '/img/pesok/klouny.jpg',
            'description' => '<p>Друзья, к нам едут клоуны</p><p>«Клоуны могут всё» - это игровое эстрадно-цирковое представление.</p><p>Истории разыгрываются актёрами и артистами цирка-клоунами. В представление органично входят клоунские репризы, забавные цирковые номера, игры, розыгрыши.</p><p>Истинный клоун – явление уникальное, «штучное». Каждый клоун, несомненно опираясь на традиции предшественников, создает свой индивидуальный художественный мир, коренным образом отличающийся от всего, созданного ранее.</p><p>Так что приходите всей семьей и приводите друзей!</p>',
            'created_at' => '2022-09-10 07:00:00',
            'updated_at' => '2022-09-10 07:00:00'
        ]);
    }
}