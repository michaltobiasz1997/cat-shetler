<?php

namespace Database\Factories;

use App\Enums\ShelterStatusEnum;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Shelter>
 */
class ShelterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'street' => $this->faker->streetName,
            'house' => $this->faker->buildingNumber,
            'zipcode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'status' => $this->faker->randomElement(ShelterStatusEnum::cases()),
        ];
    }
}
