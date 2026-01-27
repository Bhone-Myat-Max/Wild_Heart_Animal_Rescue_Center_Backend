<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'animal_id'      => $this->animal_id,
            'tagcode'        => $this->tagcode_name,
            'species'        => $this->species,
            'gender'         => $this->gender,
            'age'            => $this->estimated_age,
            'health_status'  => $this->health_status,
            'rescue_date'    => $this->rescue_date,
            'current_status' => $this->current_status,
            'image_url'      => $this->image ? asset('animalImages/' . $this->image) : null,
            // 'created_at'     => $this->created_at->format('Y-m-d H:i:s'),
            // 'updated_at'     => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
