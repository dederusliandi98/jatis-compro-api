<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Portfolio;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::insert(
            [
                [
                    "id" => "219c9b34f5774529a99ad4e26190812d",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "title" => "portfolio title 4",
                    "image" => "2206010439_portfolio.png"
                ],
                [
                    "id" => "7b6ae09850e1404e8d3f5d9d20bb4e8c",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "title" => "portfolio title 3",
                    "image" => "2206010436_portfolio.png"
                ],
                [
                    "id" => "d3f25a98653341b2b56f084019b7f302",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "title" => "portfolio title 2",
                    "image" => "2206010432_portfolio.png"
                ],
                [
                    "id" => "e108076a535b4fb29b07d53b94addd56",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "title" => "portfolio title 1",
                    "image" => "2206010425_portfolio.png"
                ]
            ]
        );
    }
}
