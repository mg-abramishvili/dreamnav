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
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 1,
                "kiosk_id" => 1,
                "point_id" => 1,
                "route_code_floor1" => "[{\"x\":194,\"y\":661},{\"x\":197,\"y\":657},{\"x\":211,\"y\":592},{\"x\":219,\"y\":578},{\"x\":237,\"y\":564},{\"x\":269,\"y\":543},{\"x\":295,\"y\":536},{\"x\":319,\"y\":538},{\"x\":354,\"y\":552},{\"x\":434,\"y\":594},{\"x\":548,\"y\":626}]",
                "route_code_floor2" => null,
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 2,
                "kiosk_id" => 1,
                "point_id" => 2,
                "route_code_floor1" => "[{\"x\":197,\"y\":658},{\"x\":202,\"y\":640},{\"x\":209,\"y\":610},{\"x\":213,\"y\":584},{\"x\":230,\"y\":568},{\"x\":265,\"y\":544},{\"x\":295,\"y\":536},{\"x\":324,\"y\":540},{\"x\":354,\"y\":548},{\"x\":385,\"y\":562},{\"x\":419,\"y\":545}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 3,
                "kiosk_id" => 1,
                "point_id" => 3,
                "route_code_floor1" => "[{\"x\":197,\"y\":660},{\"x\":205,\"y\":623},{\"x\":211,\"y\":588},{\"x\":235,\"y\":564},{\"x\":288,\"y\":523},{\"x\":382,\"y\":448}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 4,
                "kiosk_id" => 1,
                "point_id" => 4,
                "route_code_floor1" => "[{\"x\":196,\"y\":659},{\"x\":209,\"y\":595},{\"x\":227,\"y\":569},{\"x\":329,\"y\":489},{\"x\":375,\"y\":462},{\"x\":398,\"y\":456},{\"x\":433,\"y\":500},{\"x\":443,\"y\":498}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 5,
                "kiosk_id" => 1,
                "point_id" => 5,
                "route_code_floor1" => "[{\"x\":195,\"y\":658},{\"x\":203,\"y\":631},{\"x\":225,\"y\":631}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 6,
                "kiosk_id" => 1,
                "point_id" => 6,
                "route_code_floor1" => "[{\"x\":195,\"y\":659},{\"x\":202,\"y\":630},{\"x\":215,\"y\":630},{\"x\":217,\"y\":654},{\"x\":246,\"y\":647},{\"x\":281,\"y\":634}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 7,
                "kiosk_id" => 1,
                "point_id" => 7,
                "route_code_floor1" => "[{\"x\":195,\"y\":659},{\"x\":210,\"y\":590},{\"x\":274,\"y\":536},{\"x\":363,\"y\":464},{\"x\":391,\"y\":457},{\"x\":403,\"y\":449},{\"x\":404,\"y\":437},{\"x\":397,\"y\":428},{\"x\":387,\"y\":426},{\"x\":381,\"y\":427},{\"x\":351,\"y\":376},{\"x\":418,\"y\":300},{\"x\":418,\"y\":279}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 8,
                "kiosk_id" => 1,
                "point_id" => 8,
                "route_code_floor1" => "[{\"x\":195,\"y\":658},{\"x\":209,\"y\":590},{\"x\":235,\"y\":565},{\"x\":302,\"y\":510},{\"x\":372,\"y\":462},{\"x\":394,\"y\":456},{\"x\":404,\"y\":445},{\"x\":402,\"y\":434},{\"x\":395,\"y\":427},{\"x\":381,\"y\":426},{\"x\":350,\"y\":375},{\"x\":390,\"y\":335},{\"x\":383,\"y\":328}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 9,
                "kiosk_id" => 1,
                "point_id" => 9,
                "route_code_floor1" => "[{\"x\":195,\"y\":660},{\"x\":207,\"y\":616},{\"x\":213,\"y\":586},{\"x\":249,\"y\":553},{\"x\":315,\"y\":502},{\"x\":365,\"y\":462},{\"x\":387,\"y\":458},{\"x\":399,\"y\":452},{\"x\":404,\"y\":440},{\"x\":401,\"y\":430},{\"x\":393,\"y\":428},{\"x\":381,\"y\":426},{\"x\":351,\"y\":377},{\"x\":418,\"y\":303},{\"x\":426,\"y\":294},{\"x\":454,\"y\":296}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 10,
                "kiosk_id" => 1,
                "point_id" => 10,
                "route_code_floor1" => "[{\"x\":193,\"y\":660},{\"x\":211,\"y\":586},{\"x\":234,\"y\":566},{\"x\":271,\"y\":540},{\"x\":303,\"y\":536},{\"x\":339,\"y\":544},{\"x\":371,\"y\":561},{\"x\":481,\"y\":631},{\"x\":503,\"y\":660},{\"x\":519,\"y\":668},{\"x\":521,\"y\":678}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 11,
                "kiosk_id" => 1,
                "point_id" => 11,
                "route_code_floor1" => "[{\"x\":194,\"y\":660},{\"x\":201,\"y\":636},{\"x\":213,\"y\":582},{\"x\":289,\"y\":521},{\"x\":356,\"y\":469},{\"x\":387,\"y\":458},{\"x\":403,\"y\":450},{\"x\":405,\"y\":438},{\"x\":402,\"y\":430},{\"x\":453,\"y\":387},{\"x\":451,\"y\":370},{\"x\":451,\"y\":354},{\"x\":450,\"y\":342}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 12,
                "kiosk_id" => 1,
                "point_id" => 12,
                "route_code_floor1" => "[{\"x\":195,\"y\":659},{\"x\":284,\"y\":781},{\"x\":323,\"y\":760},{\"x\":327,\"y\":749},{\"x\":335,\"y\":734},{\"x\":349,\"y\":710},{\"x\":355,\"y\":698}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ],
            [
                "floor1_text_begin" => null,
                "floor1_text_end" => null,
                "floor2_text_begin" => null,
                "floor2_text_end" => null,
                "id" => 13,
                "kiosk_id" => 1,
                "point_id" => 13,
                "route_code_floor1" => "[{\"x\":195,\"y\":660},{\"x\":285,\"y\":782},{\"x\":327,\"y\":757},{\"x\":334,\"y\":733}]",
                "route_code_floor2" => "[]",
                "scheme1_id" => 1,
                "scheme2_id" => null,
                "created_at" => "2022-09-10 07:00:00",
                "updated_at" => "2022-09-10 07:00:00"
            ]
        ]);
    }
}