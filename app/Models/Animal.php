<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Animal extends Model
{
    protected $primaryKey = 'animal_id'; // Defined in migration

    protected $fillable = [
        'rescue_id',
        'tagcode_name',
        'species',
        'gender',
        'estimated_age',
        'health_status',
        // 'image', // <--- Added this to allow image uploads
        'rescue_date',
        'current_status'
    ];

    // An animal belongs to one rescue case
    public function rescueCase(): BelongsTo
    {
        return $this->belongsTo(RescueCase::class, 'rescue_id');
    }

    // An animal can have many treatments
    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class, 'animal_id', 'animal_id');
    }

    // An animal has one adoption record
    public function adoption(): HasOne
    {
        return $this->hasOne(Adopt::class, 'animal_id', 'animal_id');
    }
}
