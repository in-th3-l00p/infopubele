<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable =[
        "completed"
    ];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }
}
