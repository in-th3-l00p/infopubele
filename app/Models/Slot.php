<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "volume", "max_volume", "device_id", "order"
    ];

    public function device() {
        return $this->belongsTo(Device::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
