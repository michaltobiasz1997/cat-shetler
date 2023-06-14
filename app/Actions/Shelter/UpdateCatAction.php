<?php

namespace App\Actions\Shelter;

use App\Models\Cat;

class UpdateCatAction
{
    public function __invoke(Cat $cat, array $catData): Cat
    {
        $cat->update($catData);

        return $cat;
    }
}
