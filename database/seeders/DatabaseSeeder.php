<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PortfoliosTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(InformationTableSeeder::class);
        \Artisan::call('passport:install');
    }
}
