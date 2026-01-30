<?php

namespace App\Models;

use App\Models\User;
use App\Models\RescueCase;
use Illuminate\Database\Eloquent\Model;

class RescueAssignment extends Model
{


    protected $fillable = [
        'rescue_case_id',
        'user_id',
        // 'assigned_by',
        // 'assigned_date',
        // 'role_in_case',
        'assignment_status',
    ];

    protected $casts = [
        'assigned_date' => 'datetime',
    ];

    // Relationships
    public function rescueCase()
    {
        return $this->belongsTo(RescueCase::class , 'rescue_case_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    // public function assignedBy()
    // {
    //     return $this->belongsTo(User::class, 'assigned_by');
    // }
}
