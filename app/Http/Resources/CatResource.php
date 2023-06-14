<?php

namespace App\Http\Resources;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Cat */
class CatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shelter_id' => $this->shelter_id,
            'name' => $this->name,
            'chip_number' => $this->chip_number,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
