<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdoptResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'adopt_id'     => $this->adopt_id,
            'animal_id'    => $this->animal_id,
            'animal_tag'   => $this->whenLoaded('animal', function () {
                return $this->animal->tagcode_name;
            }),
            'species'      => $this->species,
            'adopter'      => $this->adopted_by,
            'contact_info' => [
                'email'    => $this->email,
                'phone'    => $this->phone_number,
                'address'  => $this->address,
            ],
            'adopted_date' => $this->adopted_date,
            // 'created_at'   => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
