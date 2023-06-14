<?php

namespace Database\Factories;

use App\Enums\CatGenderEnum;
use App\Enums\CatStatusEnum;
use App\Models\Cat;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Cat>
 */
class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shelter_id' => Shelter::factory(),
            'name' => Str::ucfirst($this->faker->word),
            'chip_number' => $this->faker->randomNumber(5),
            'gender' => $this->faker->randomElement(CatGenderEnum::cases()),
            'birthday' => $this->faker->date(),
            'status' => $this->faker->randomElement(CatStatusEnum::cases()),
        ];
    }
}
