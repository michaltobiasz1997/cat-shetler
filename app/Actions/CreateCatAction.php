<?php

namespace App\Actions;

use App\Models\Cat;

class CreateCatAction
{
    public function __invoke(array $catData): Cat
    {
        return Cat::query()->create($catData);
    }
}
