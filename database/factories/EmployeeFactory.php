<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;
use libphonenumber\PhoneNumberType;
use libphonenumber\PhoneNumberUtil;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();

        $phone = $phoneNumberUtil->getExampleNumberForType('PL', PhoneNumberType::MOBILE);

        return [
            'shelter_id' => Shelter::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'phone' => $phone->getNationalNumber(),
            'country' => $phoneNumberUtil->getRegionCodeForNumber($phone),
        ];
    }
}
