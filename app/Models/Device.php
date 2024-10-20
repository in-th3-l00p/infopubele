<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "series",
        "city",
        "latitude",
        "longitude",
    ];

    /**
     * Associated users
     * @return HasMany : A device has many users
     */
    public function associatedUser(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Device owner
     * @return BelongsTo : A device belongs to a user
     */
    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, "owner_id");
    }
}
