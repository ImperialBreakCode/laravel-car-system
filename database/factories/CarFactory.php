<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\ManufacturerModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'year_of_manufacturing' => $this->faker->year(),
            'kilometers_traveled' => $this->faker->numberBetween(0, 500000),
            'manufacturer_id' => Manufacturer::factory(),
            'model_id' => ManufacturerModel::factory(),
            'image' => $this->faker->image(storage_path('app/public/cars'), 480, 480, fullPath:false)
        ];
    }
}
