<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'uuid' => $this->faker->uuid(),
            'brand' => $this->faker->word,
            'specs' => $this->faker->text(200),
            'phone_image' => "phone_placeholder.jpg",
            'user_id' => '1'



        ];
    }
}
