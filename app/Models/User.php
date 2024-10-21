<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'city',
        'device_id',
        'owner_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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
        ];
    }

    /**
     * It's associated device, only for the user role
     * @return BelongsTo : device relationship
     */
    public function associatedDevice(): BelongsTo {
        return $this->belongsTo(Device::class);
    }

    /**
     * Devices associated with the user, only for operators & generators
     * @return BelongsToMany : device relationship
     */
    public function associatedDevices(): BelongsToMany {
        return $this->belongsToMany(Device::class);
    }

    /**
     * Devices created by the user, only for admin and uat
     * @return HasMany : device relationship
     */
    public function createdDevices(): HasMany
    {
        return $this->hasMany(Device::class, "owner_id");
    }

    /**
     * Cards associated with the user
     * @return HasMany : card relationship
     */
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Owner of the user, nullable
     * @return BelongsTo : user relationship
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, "owner_id");
    }
}
