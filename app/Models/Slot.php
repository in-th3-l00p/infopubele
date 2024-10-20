<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    /** @use HasFactory<\Database\Factories\SlotFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "volume",
        "max_volume",
        "device_id",
        "owner_id",
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the cards for the Slot
     * @return HasMany : The cards for the Slot
     */
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
