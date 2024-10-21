<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceReport extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceReportFactory> */
    use HasFactory;

    protected $fillable = [
        "device_name",
        "device_city",
        "device_latitude",
        "device_longitude",
        "spreadsheet_link",
        "owner_id"
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function slots() {
        return $this->hasMany(DeviceReportSlot::class);
    }

    public function device() {
        return $this->belongsTo(Device::class);
    }
}
