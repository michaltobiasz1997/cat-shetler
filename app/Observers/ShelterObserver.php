<?php

namespace App\Observers;

use App\Models\Shelter;

class ShelterObserver
{
    public function saving(Shelter $shelter): void
    {
        $shelter->address = sprintf('%s %s, %s %s', $shelter->street, $shelter->house, $shelter->zipcode, $shelter->city);
    }
}
