<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adopt extends Model
{
    protected $primaryKey = 'adopt_id'; // Defined in migration

    protected $fillable = [
        'animal_id', 'species', 'adopted_by', 'address', 'email', 'adopted_date', 'phone_number'
    ];

    // Link back to the animal that was adopted
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'animal_id');
    }
}
