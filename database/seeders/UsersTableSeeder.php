<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@mail.com',
            'name' => 'Admin Jatis Mobile',
            'password' => bcrypt('secret'),
        ]);
    }
}
