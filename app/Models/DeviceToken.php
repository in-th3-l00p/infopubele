<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{
    use HasFactory;

    protected $fillable = [
        "token", "device_id"
    ];

    public function device() {
        return $this->belongsTo(Device::class);
    }
}
