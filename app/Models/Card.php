<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $id)
 */
class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        "uuid",
        "user_id",
        "device_id",
    ];

    /**
     * Get the user that owns the Card
     * @return BelongsTo : The user that owns the Card
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the device that owns the Card
     * @return BelongsTo : The device that owns the Card
     */
    public function device() {
        return $this->belongsTo(Device::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
