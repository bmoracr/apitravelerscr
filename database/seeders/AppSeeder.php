<?php

namespace Database\Seeders;

use App\Models\Api\Apps\App;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App::factory(1)->create();
        
    }
}
