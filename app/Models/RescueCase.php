<?php

namespace App\Models;

use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RescueCase extends Model
{


    protected $fillable = [
        'case_title',
        'reported_by',
        'location',
        'description',
        'priority_level',
        'case_status',
        // 'reported_date',
        // 'completed_date',
    ];

    protected $casts = [
        'reported_date' => 'date',
        'completed_date' => 'date',
    ];

    // Priority constants
    const PRIORITY_LOW = 'Low';
    const PRIORITY_MEDIUM = 'Medium';
    const PRIORITY_HIGH = 'High';
    const PRIORITY_EMERGENCY = 'Emergency';

    // Status constants
    const STATUS_PENDING = 'Pending';
    const STATUS_PROGRESS = 'In Progress';
    const STATUS_COMPLETED = 'Completed';

    //     public function assignments()
    // {
    //     return $this->hasMany(RescueAssignment::class);
    // }

    // public function staff()
    // {
    //     return $this->belongsToMany(User::class, );

    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'rescue_assignments')
            ->withTimestamps();
    }
}
