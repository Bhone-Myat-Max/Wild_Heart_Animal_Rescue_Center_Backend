<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'animal_id',
        'user_id',
        'diagnosis',
        'treatmentdate',
        'notes',
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
