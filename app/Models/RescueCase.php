<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RescueCase extends Model
{
    protected $fillable = [
        'user_id',
        'species',
        'reported_by',
        'email',
        'phone_number',
        'description',
        'user_id',
        'rescue_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
