<?php

namespace Database\Seeders;

use App\Models\Api\Tours\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tour::factory()->make();
    }
}
