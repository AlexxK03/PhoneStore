<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\phone>
 */
class phoneFactory extends Factory
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
            'brand' => $this->faker->word,
            'specs' => $this->faker->text(200),
            'phone_image' => "public\image\phone_placeholder.jpg"



        ];
    }
}
