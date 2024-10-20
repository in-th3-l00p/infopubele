<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'slot_id',
        'card_id',
        'amount',
    ];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
