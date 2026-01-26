<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Treatment extends Model
{
    protected $primaryKey = 'treatment_id'; // Defined in migration

    protected $fillable = [
        'animal_id', 'user_id', 'diagnosis', 'treatment_date', 'notes'
    ];

    // Link back to the animal
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'animal_id');
    }

    // Link to the staff member/user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
