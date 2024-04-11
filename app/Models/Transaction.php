<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $fillable = [
        "amount", "slot_id", "card_id"
    ];

    public function slot() {
        return $this->belongsTo(Slot::class);
    }
}
