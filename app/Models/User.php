<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Treatment;
use App\Models\RescueCase;
use App\Models\RescueAssignment;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'status',
        'email',
        'password',
        'availability_status'
    ];

    //     protected $casts = [
    //     'availability_status' => 'string',
    // ];

    const STATUS_FREE = 'Free';
    const STATUS_ON_MISSION = 'On Mission';
    const STATUS_OFF_DUTY = 'Off Duty';

    public function rescueAssignments()
    {
        return $this->hasMany(RescueAssignment::class);
    }

    // public function rescueCases()
    // {
    //     return $this->belongsToMany(RescueCase::class, 'rescue_assignments')
    //                 ->withPivot('role_in_case', 'assignment_status');
    // }

     public function treatment(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
            'availability_status' => 'string',
        ];
    }


     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
