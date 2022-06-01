<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Carbon\Carbon;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Contact::insert([
            [
                "id" => "0d783e8203c74ba6a4a6f77301432311",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "name" => "Dede Rusliandi",
                "email" => "dede.rusliandi1@gmail.com",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur. Labore, cumque, optio, ipsam sequi illum animi non magnam totam tempora recusandae consectetur incidunt nam quae accusamus culpa ipsum alias.",
            ],
            [
                "id" => "45e57e1f11fc41a59ffffda8c44ca06b",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "name" => "Della Fadila",
                "email" => "della.fadila@gmail.com",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur. Labore, cumque, optio, ipsam sequi illum animi non magnam totam tempora recusandae consectetur incidunt nam quae accusamus culpa ipsum alias.",
            ],
            [
                "id" => "5888a630e8354b6eb622c7f623fc3f7e",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "name" => "Setiawan Gunadi",
                "email" => "setiawan.gunadi@gmail.com",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur. Labore, cumque, optio, ipsam sequi illum animi non magnam totam tempora recusandae consectetur incidunt nam quae accusamus culpa ipsum alias.",
            ],
            [
                "id" => "771d2c1d5353405980e85d777d3b813c",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "name" => "Muhammad Iqbal Dzulfikar Rusdhi",
                "email" => "iqbal.muhammad29@gmail.com",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur. Labore, cumque, optio, ipsam sequi illum animi non magnam totam tempora recusandae consectetur incidunt nam quae accusamus culpa ipsum alias.",
            ],
            [
                "id" => "c28cbc46e7474dcc8115560d457c8075",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "deleted_at" => null,
                "name" => "Aditya Aria Subagja",
                "email" => "aditya.aria@gmail.com",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur. Labore, cumque, optio, ipsam sequi illum animi non magnam totam tempora recusandae consectetur incidunt nam quae accusamus culpa ipsum alias.",
            ],
        ]);
    }
}
