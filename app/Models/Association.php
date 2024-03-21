<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        "fiscal_code", "person_name", "phone", "email", "address", "city", "inhabitants", "device_id"
    ];

    public function devices()
    {
        return $this->hasOne(Device::class);
    }



}
