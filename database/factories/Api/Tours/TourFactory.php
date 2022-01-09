<?php
namespace Database\Factories\Api\Tours;

use App\Models\Api\Tours\Tour;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'code' => $faker->unique()->numberBetween(500000, 1000000),
            'name' => $faker->unique()->name(),
            'description' => $faker->paragraph(),
            'category_id' => $faker->randomElement([1, 2, 3, 4, 5]),
            'includes' => $faker->randomElement(['Tickets, Lunch', 'Tickets, Lunch, Dinner', 'Tickets, Dinner']),
            'extras' => $faker->randomElement(['Water', 'Beers', 'Other']),
            'p_web_plus' => $faker->randomFloat(1, 25, 100),
            'p_web_less' => $faker->randomFloat(1, 25, 100),
            'p_brouchure_rack' => $faker->randomFloat(1, 25, 100),
            'p_brouchure_neto' => $faker->randomFloat(1, 25, 100),
            'p_brouchure_comission' => $faker->randomFloat(1, 25, 100),
            'status' => $faker->numberBetween(0, 1),
            'to_brouchure' => $faker->numberBetween(0, 1),
            'to_web' => $faker->numberBetween(0, 1),
            'to_seasonal' => $faker->numberBetween(0, 100),
            'userId' => 1,
            'image' => null,
        ];
    }
}