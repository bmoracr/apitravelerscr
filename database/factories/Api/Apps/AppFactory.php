<?php

namespace Database\Factories\Api\Apps;

use App\Models\Api\Apps\App;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'app_id' => "3101325687",
            'app_name' => "Travelers Costa Rica",
            'comercial_name' => "TravelersCR",
            'iva' => 0.13,
            'phone_number' => '+50684490008',
            'sociable_whatsapp' => "https://wa.me/message/6GVE5AXM4ZGUL1",
            'sociable_instagram' => "https://www.instagram.com/travelerscr/",
            'sociable_facebook' => "https://www.facebook.com/travelerscr",
            'sociable_twiter' =>"https://twitter.com/travelerscr/",
            'sociable_linkedin' =>"https://www.linkedin.com/travelerscr/",
            'description' => "La mejor tour operadora de costa rica",
        ];
    }
}