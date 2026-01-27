<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'treatment_id'   => $this->treatment_id,
            'animal_id'      => $this->animal_id,
            'animal'         => new AnimalResource($this->whenLoaded('animal')),
            'diagnosis'      => $this->diagnosis,
            'treatment_date' => $this->treatment_date,
            'notes'          => $this->notes,
            'vet_id'         => $this->user_id,
            'recorded_by'    => $this->whenLoaded('user', function() {
                                    return $this->user->name;
                                }),
            // 'created_at'     => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
