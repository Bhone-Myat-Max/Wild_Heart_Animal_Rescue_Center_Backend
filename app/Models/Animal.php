<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
     protected $fillable = [
        'tagcode',
        'species',
        'gender',
        'estimated_age',
        'health_status',
        'rescue_id',
        'current_status',
    ];

     public function rescue(): BelongsTo
    {
        return $this->BelongsTo(RescueCase::class , 'rescue_id');
    }

}
