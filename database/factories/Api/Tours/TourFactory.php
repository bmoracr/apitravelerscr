<?php

namespace Database\Factories\Api\Tours;

use App\Models\Api\Tours\Tour;
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
        return [
            'code' => $this->faker()->sentence(),
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
        ];
    }
}
