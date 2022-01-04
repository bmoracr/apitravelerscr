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
            'category_id' => 1,
            'includes' => $faker->randomElement(['Tickets, Lunch', 'Tickets, Lunch, Dinner', 'Tickets, Dinner']),
            'additional' => $faker->randomElement(['Water, Beers', 'Water']),
            'p_web_plus' => $faker->randomFloat(1, 25, 100),
            'p_web_less' => $faker->randomFloat(1, 25, 100),
            'p_brouchure_rack' => $faker->randomFloat(1, 25, 100),
            'p_brouchure_neto' => $faker->randomFloat(1, 25, 100),
            'p_brouchure_comission' => $faker->randomFloat(1, 25, 100),
            'status' => $faker->numberBetween(0, 1),
            'to_brouchure' => $faker->numberBetween(0, 1),
            'to_web' => $faker->numberBetween(0, 1),
            'to_seasonal' => $faker->numberBetween(0, 1),
            'username' => $faker->word(),
        ];
    }
}



            // 'code' => $this->faker()->sentence(),
            // 'name' => $this->faker()->sentence(),
            // 'description' => $this->faker()->paragraph(),
            // 'category' => $this->faker()->randomElement(['playa', 'naturaleza', 'cultural', 'volcan', 'other']),
            // 'includes' => $this->faker()->randomElement(['Tickets, Lunch', 'Tickets, Lunch, Dinner', 'Tickets, Dinner']),
            // 'additional' => $this->faker()->randomElement(['Water, Beers', 'Water']),
            // 'p_web_plus' => $this->faker()->boolean(25),
            // 'p_web_less' => $this->faker()->boolean(25),
            // 'p_brouchure_rack' => $this->faker()->boolean(25),
            // 'p_brouchure_neto' => $this->faker()->boolean(25),
            // 'p_brouchure_comission' => $this->faker()->boolean(25),
            // 'status' => $this->faker()->randomElement([true, false]),
            // 'to_brouchure' => $this->faker()->randomElement([true, false]),
            // 'to_web' => $this->faker()->randomElement([true, false]),
            // 'to_seasonal' => $this->faker()->randomElement([true, false]),
            // 'username' => $this->faker()->sentence(),