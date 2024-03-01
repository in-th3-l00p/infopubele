<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceReport extends Model
{
    use HasFactory;

    protected $fillable = [
        "device_name",
        "device_city",
        "device_latitude",
        "device_longitude",
        "device_id",
        "user_id"
    ];

    public function device() {
        return $this->belongsTo(Device::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function slots() {
        return $this->hasMany(DeviceReportSlot::class);
    }
}
