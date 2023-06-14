<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cat;
use App\Models\Employee;
use App\Models\Shelter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Shelter::factory()
            ->count(20)
            ->has(Cat::factory()->count(10))
            ->has(Employee::factory()->count(10))
            ->create();
    }
}
