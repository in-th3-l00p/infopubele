<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceReportSlot extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "volume",
        "max_volume",
        "device_id"
    ];

    public function report() {
        return $this->belongsTo(DeviceReport::class);
    }
}
