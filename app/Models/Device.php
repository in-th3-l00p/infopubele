<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "series",
        "city",
        "latitude",
        "longitude",
        "owner_id",
    ];

    /**
     * Associated users, with role user
     * @return HasMany : A device has many users
     */
    public function associatedUser(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Associated users, with role operator & generator
     * @return HasMany : A device has many users
     */
    public function associatedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Device owner
     * @return BelongsTo : A device belongs to a user
     */
    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, "owner_id");
    }

    /**
     * Device slots
     * @return HasMany : A device has many slots
     */
    public function slots(): HasMany {
        return $this->hasMany(Slot::class);
    }

    /**
     * Device slots that have more then 90% of their capacity filled
     * @return HasMany : A device has many slots
     */
    public function filledSlots(): HasMany {
        return $this
            ->slots()
            ->where("(volume / max_volume) * 100", ">", 90);
    }

    /**
     * Cards allocated to this device
     * @return HasMany
     */
    public function cards() {
        return $this->hasMany(Card::class);
    }

    public function reports(): HasMany {
        return $this->hasMany(DeviceReport::class);
    }
}
