<?php

namespace Database\Factories;

use App\Models\Plant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_category_id' => $this->faker->numberBetween(2, 8),
            'slug' => 'slug-'.$this->faker->lexify('????'),
            'indoor_light' => Plant::INDOOR_LIGHT_LOW,
            'difficulty' => Plant::DIFFICULTY_NO_FUSS,
            'height' => 30,
            'size' => Plant::SIZE_EXTRA_SMALL,
        ];
    }
}
