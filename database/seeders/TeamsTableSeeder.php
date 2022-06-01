<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use Carbon\Carbon;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::insert([
            [
                "id" => "45628bb903b94dbc8e276ab99064e86a",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "name" => "team name 2",
                "position" => "staff",
                "image" => "2206010517_team.png"
            ],
            [
                "id" => "7a1428c4698640e6b8cedb1f70c82bad",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "name" => "team name 5",
                "position" => "staff",
                "image" => "2206010527_team.png"
            ],
            [
                "id" => "b4d8e45357684635a60690d19e59d210",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "name" => "team name 4",
                "position" => "staff",
                "image" => "2206010524_team.png"
            ],
            [
                "id" => "dad72270e88e4fec80e959a2b1589d32",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "name" => "team name 3",
                "position" => "staff",
                "image" => "2206010521_team.png"
            ],
            [
                "id" => "f39100c3e2c2428d9288e7788d18adaa",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "name" => "team name 1",
                "position" => "staff",
                "image" => "2206010513_team.png"
            ]
        ]);
    }
}
