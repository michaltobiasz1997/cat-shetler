<?php

namespace App\Actions;

use App\Models\Shelter;

class UpdateShelterAction
{
    public function __invoke(Shelter $shelter, array $shelterData): Shelter
    {
        $shelter->update($shelterData);

        return $shelter;
    }
}
