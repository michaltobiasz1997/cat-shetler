<?php

namespace App\Http\Resources;

use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Shelter */
class ShelterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cats' => $this->whenLoaded('cats', CatResource::collection($this->cats)),
            'cats_count' => $this->whenCounted('cats'),
            'employees' => $this->whenLoaded('employees', EmployeeResource::collection($this->employees)),
            'employees_count' => $this->whenCounted('employees'),
        ];
    }
}
