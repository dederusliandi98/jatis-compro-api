<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Carbon\Carbon;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::insert(
            [
                [
                    "id" => "2176217f8c0246f7a32c1c1d77d80f9d",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "name" => "client name 2",
                    "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim sequi facilis, qui fugiat dicta quia incidunt voluptatem fugit id dolorum facere molestiae minima ab optio minus sit hic sed atque."
                ],
                [
                    "id" => "74bf4dcb67894ecf8a0a27ed5163974a",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "name" => "client name 5",
                    "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim sequi facilis, qui fugiat dicta quia incidunt voluptatem fugit id dolorum facere molestiae minima ab optio minus sit hic sed atque."
                ],
                [
                    "id" => "923c07c7e4b04256a3f49a72fcf131a6",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "name" => "client name 4",
                    "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim sequi facilis, qui fugiat dicta quia incidunt voluptatem fugit id dolorum facere molestiae minima ab optio minus sit hic sed atque."
                ],
                [
                    "id" => "9bdde2aa7fcf4d16be2384a039599fa0",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "name" => "client name 3",
                    "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim sequi facilis, qui fugiat dicta quia incidunt voluptatem fugit id dolorum facere molestiae minima ab optio minus sit hic sed atque."
                ],
                [
                    "id" => "a10b75f8ce5b481dbfffec9b427b737a",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "deleted_at" => null,
                    "user_id" => 1,
                    "name" => "client name 1",
                    "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim sequi facilis, qui fugiat dicta quia incidunt voluptatem fugit id dolorum facere molestiae minima ab optio minus sit hic sed atque."
                ]
            ]
        );
    }
}
