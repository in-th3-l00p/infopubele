<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceReportSlot extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceReportSlotFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "volume",
        "max_volume",
        "device_report_id",
        "slot_id"
    ];

    public function report() {
        return $this->belongsTo(DeviceReport::class);
    }

    public function slot() {
        return $this->belongsTo(Slot::class);
    }
}
