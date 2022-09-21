<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BlockSeeder extends Seeder
{
    public function run()
    {
        DB::table('blocks')->insert([
            [
                'id' => 1,
                'page_id' => 1,
                'type' => 'image_slider',
                'content' => '/img/pesok/banner1.jpg',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 2,
                'page_id' => 1,
                'type' => 'text',
                'content' => '<p>Общая площадь территории парка «Песчанка», составляет 12,5 гектар. В парке есть свой амфитеатр для проведения здесь культурно-массовых мероприятий, вместимостью до 1050 зрителей.</p><p>Также у нас есть детская площадка, смотровая, зона для занятий спортом и даже большой скейт парк с памп-треком.</p><p>Для гостей парка создана обширная сеть пешеходных дорожек общей протяженностью более 2 км, поставлены шезлонги, скамейки. В рамках программы «Безопасный город» в парке установлено 68 видеокамер</p>',
                'order' => 2,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 3,
                'page_id' => 2,
                'type' => 'events',
                'content' => 'events',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 4,
                'page_id' => 3,
                'type' => 'image',
                'content' => '/img/pesok/icons1.png',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 5,
                'page_id' => 3,
                'type' => 'image',
                'content' => '/img/pesok/icons2.png',
                'order' => 2,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 6,
                'page_id' => 3,
                'type' => 'text',
                'content' => '<p>Уважаемые посетители!</p><p>Правила посещения общественного пространства «Парк ПЕСЧАНКА»</p><p>Администрация МУ «ВМУК», осуществляющая эксплуатацию общественного пространства «Парк ПЕСЧАНКА», просит внимательно ознакомиться с настоящими правилами до момента начала отдыха в общественном пространстве «Парк ПЕСЧАНКА» (далее -Парк).</p><p>Находясь на территории парка, для обеспечения Вашей безопасности и безопасности окружающих Вас людей, Вы добровольно соглашаетесь с настоящими правилами. Нахождением на территории парка, Вы подтверждаете, что ознакомлены и согласны с настоящими правилами.</p><p>При посещении парка и пользовании парковым оборудованием и аттракционами посетители также обязаны ознакомиться с правилами посещения аттракционов, и строго их выполнять.</p><p>1. Администрация МУ ВМУК и охрана имеют право на ограничение входа на территорию парка посетителей, поведение которых угрожает безопасному отдыху других лиц.</p><p>2. Администрация МУ ВМУК не несет ответственности за несчастные случаи, возникшие в результате несоблюдения посетителями правил безопасности, в частности: при самовольном проникновении на территории, обозначенные информационными табличками как «опасные»/ «запрещенные к доступу»; при самовольном катании на санях, ледянках, сноутюбингах и пр.; при самовольном разведении костров, и пользовании мангалами; при самовольном пользовании пиротехникой; при нарушении правил посещения аттракционов, пользования спортивным/игровым инвентарем; при ненадлежащем и недостаточном контроле за сопровождаемыми несовершеннолетними.</p>',
                'order' => 3,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 7,
                'page_id' => 4,
                'type' => 'routes',
                'content' => 'routes',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 8,
                'page_id' => 7,
                'type' => 'image_slider',
                'content' => '/img/pesok/banner1.jpg',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 9,
                'page_id' => 6,
                'type' => 'image',
                'content' => '/img/pesok/qr-code.png',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
            [
                'id' => 10,
                'page_id' => 6,
                'type' => 'text',
                'content' => '<p>+7 (813) 704-33-21 Информационный</p><p>+7 (952) 222-46-45 Охрана</p>',
                'order' => 1,
                'created_at' => '2022-09-10 07:00:00',
                'updated_at' => '2022-09-10 07:00:00'
            ],
        ]);
    }
}