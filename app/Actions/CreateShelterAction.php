<?php

namespace App\Actions;

use App\Models\Shelter;

class CreateShelterAction
{
    public function __invoke(array $shelterData): Shelter
    {
        return Shelter::query()->create($shelterData);
    }
}
