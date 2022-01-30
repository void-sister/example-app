<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_category_id' => $this->faker->numberBetween(10, 12),
            'slug' => 'slug-'.$this->faker->lexify('????'),
            'height' => $this->faker->randomDigitNotZero(),
            'diameter' => $this->faker->randomDigitNotZero(),
            'material' => $this->faker->randomDigit(),
        ];
    }
}
