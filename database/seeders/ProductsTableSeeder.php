<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                "id" => "4cf6ce97684e4c29965eca7c412248a3",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "product title 5",
                "image" => "2206010455_product.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni voluptatem deserunt inventore recusandae dolorum reprehenderit pariatur? Pariatur recusandae et nulla quod autem repudiandae, molestiae deleniti, illo sint fugiat placeat laborum."
            ],
            [
                "id" => "69ec975179a7402aa85ec0031c910042",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "product title 2",
                "image" => "2206010446_product.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni voluptatem deserunt inventore recusandae dolorum reprehenderit pariatur? Pariatur recusandae et nulla quod autem repudiandae, molestiae deleniti, illo sint fugiat placeat laborum."
            ],
            [
                "id" => "7b4aa3bffc4d486cb9f17b0a298f4492",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "product title 1",
                "image" => "2206010442_product.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni voluptatem deserunt inventore recusandae dolorum reprehenderit pariatur? Pariatur recusandae et nulla quod autem repudiandae, molestiae deleniti, illo sint fugiat placeat laborum."
            ],
            [
                "id" => "93d645b8f86244fc9d78fdbf8f253212",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "product title 3",
                "image" => "2206010449_product.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni voluptatem deserunt inventore recusandae dolorum reprehenderit pariatur? Pariatur recusandae et nulla quod autem repudiandae, molestiae deleniti, illo sint fugiat placeat laborum."
            ],
            [
                "id" => "b656f35dc14544ebb7acf367977a7b88",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "user_id" => 1,
                "title" => "product title 4",
                "image" => "2206010452_product.png",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni voluptatem deserunt inventore recusandae dolorum reprehenderit pariatur? Pariatur recusandae et nulla quod autem repudiandae, molestiae deleniti, illo sint fugiat placeat laborum."
            ]
        ]);
    }
}
