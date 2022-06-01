<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::insert([
            [
                "id" => "0d783e8203c74ba6a4a6f77301432311",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "PT Astra Honda Motor",
                "image" => "2206010320_logo_client.png"
            ],
            [
                "id" => "45e57e1f11fc41a59ffffda8c44ca06b",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "Shopee",
                "image" => "2206010338_logo_client.png"
            ],
            [
                "id" => "5888a630e8354b6eb622c7f623fc3f7e",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "Akulaku",
                "image" => "2206010315_logo_client.png"
            ],
            [
                "id" => "771d2c1d5353405980e85d777d3b813c",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "Allianz",
                "image" => "2206010318_logo_client.png"
            ],
            [
                "id" => "c28cbc46e7474dcc8115560d457c8075",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "Unilever",
                "image" => "2206010332_logo_client.png"
            ]
        ]);
    }
}
