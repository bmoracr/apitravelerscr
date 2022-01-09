<?php

namespace Database\Seeders;

use Database\Seeders\CategorySeeder;
use Database\Seeders\PrivilegeSeeder;
use Database\Seeders\TourSeeder;
use Database\Seeders\UserSeeder;
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

        
        // \App\Models\User::factory(10)->create();
        // \App\Models\Api\Tours\Tour::factory()->count(3)->make();
        $this->call(CategorySeeder::class);
        $this->call(TourSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
